<?php

namespace App\Http\Services;

use App\Models\Image;
use App\Models\Product;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PDO;

use function PHPUnit\Framework\directoryExists;

class DolibarrService
{
    protected $client;
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = "ad3634d577f46311cf08ccf858098602ad95c574";
        $this->baseUrl = "http://192.168.1.56";
    }

    public function getProducts()
    {
        $allProducts = [];
        $page = 0; // Start from page 0
        $limit = 50; // Default limit per page

        try {
            while (true) {
                // Fetch products for the current page
                $response = $this->client->get("http://192.168.1.56/api/index.php/products?page=0&limit=50", [
                    'headers' => [
                        'DOLAPIKEY' => $this->apiKey,
                    ],
                    'query' => [
                        'page' => $page,
                        'limit' => $limit,
                    ],
                ]);

                $products = json_decode($response->getBody(), true);

                // Add the current page's products to the result
                if (!empty($products)) {

                    foreach ($products as $product) {
                        // Filter products where web_visible == 1
                        if ($product['array_options'] && $product['array_options']['options_web_visible'] == '1') {
                            // Fetch and merge documents (images) for the product
                            $product['documents'] = $this->getProductDocuments($product['id']);

                            //images implementation

                            $allProducts[] = $product;
                        }
                    }
                }

                // If no more products are returned, break the loop
                if (count($products) < $limit) {
                    break;
                }

                // Move to the next page
                $page++;
            }



            return $allProducts;
        } catch (RequestException $e) {
            // Handle errors
            return [];
        }
    }

    public function getProductDetails($id)
    {
        try {
            $response = $this->client->get("http://192.168.1.56/api/index.php/products/{$id}", [
                'headers' => [
                    'DOLAPIKEY' => $this->apiKey,
                ]
            ]);

            $product = json_decode($response->getBody(), true);

            // dd($product);

            if (empty($product)) {
                return []; // Return an empty array if the product is not found
            }

            // dd("here");
            // dd($product['ref']);
            // Fetching the documents (images) for the product
            $documentsResponse = $this->client->get("http://192.168.1.56/api/index.php/documents?modulepart=product&id={$id}&ref={$product['ref']}", [
                'headers' => [
                    'DOLAPIKEY' => $this->apiKey,
                ]
            ]);

            $product['documents'] = json_decode($documentsResponse->getBody(), true);

            // Processing the documents to construct image URLs
            $images = [];



            foreach ($product['documents'] as $document) {
                if ($document['type'] === 'file') {
                    // Construct the image URL
                    $imageUrl = "http://192.168.1.56/viewimage.php?modulepart=product&file={$product['ref']}/{$document['name']}";

                    // Add the image URL to the images array
                    $images[] = [
                        'name' => $document['name'],
                        'url' => $imageUrl,
                        'size' => $document['size'],
                    ];
                }
            }



            //Merging the images into the product data
            $product['images'] = $images;

            return $product;
        } catch (Exception $e) {
            return [];
        }
    }



    public function storeVisibleProductsToDatabase($products)
    {

        foreach ($products as $product) {
            try {
                // Map API data to database fields
                $data = [
                    'dolibarr_id' => $product['id'],
                    'name' => $product['array_options']['options_web_name'] ?? $product['label'],
                    'brief_description' => $product['array_options']['options_web_brief_description'] ?? null,
                    'description' => $product['array_options']['options_web_description'] ?? '--',
                    'price' => (float) $product['array_options']['options_web_price'] ?? 0.0,
                    'old_price' => (float) $product['array_options']['options_web_old_price'] ?? null,
                    'sku' => $product['array_options']['options_web_sku'] ?? '',
                    'stock_status' => $product['array_options']['options_web_stock_status'] == '1' ? 'instock' : 'outstock',
                    'quantity' => (int) $product['array_options']['options_web_quantity_good'] ?? 0,
                    'category_id' => (int) $product['array_options']['options_web_category_id'] ?? null,
                    'subcategory_id' => (int) $product['array_options']['options_web_subcategory_id'] ?? null,
                    'image' => null, // Download and store the first image
                    'selection' => false,
                    'nouveautes' => false,
                    'top_ventes' => false,
                    'dayDeals' => false,
                    'best_price' => false,
                ];

                //images implementation
                if (!empty($product['documents'])) {
                    $this->downloadAndStoreImages($product['ref'], $product['documents'], $data['dolibarr_id']);
                    $data['image'] = $product['documents'][0]['name'];

                    // Remove unused images
                    $this->removeUnusedImages($data['dolibarr_id'], $product['documents']);


                    $this->syncProductImages($data['dolibarr_id'], array_slice($product['documents'], 1));
                }

                // Save or update the product based on SKU
                Product::updateOrCreate(
                    ['sku' => $data['sku']],
                    $data
                );
            } catch (\Exception $e) {
                $e->getMessage();
            }
        }

        // Remove deleted products from dolibarr database
        $this->removeDeletedProductsInDolibarr($products);
    }

    protected function syncProductImages($dolibarrId, $apiDocuments)
    {

        // Find the product by dolibarr_id
        $product = Product::where('dolibarr_id', $dolibarrId)->first();

        if (!$product) {
            return;
        }

        // Extract filenames from the API documents
        $apiFilenames = array_column($apiDocuments, 'name');

        // Construct full paths for the API documents
        $apiImagePaths = array_map(function ($filename) use ($dolibarrId) {
            return 'productsDolibarr/' . $dolibarrId . '/' . $filename;
        }, $apiFilenames);

        // Get existing image paths for the product
        $existingImagePaths = $product->images()->pluck('path')->toArray();

        // Attach new images
        // dd($apiDocuments);
        foreach ($apiDocuments as $document) {
            $filename = $document['name'];
            $filePath = $filename;

            // Check if the image already exists
            $existingImage = Image::where('product_id', $product->id)
                ->where('path', $filePath)
                ->first();

            if (!$existingImage) {
                // Create a new image record
                Image::create([
                    'product_id' => $product->id,
                    'path' => $filePath,
                ]);
            }
        }

        // $product->save();
        // dd($apiImagePaths);
        // Detach images that are no longer in the API response
        // $product->images()->whereNotIn('path', $apiImagePaths)->delete();
        // $localFiles = File::files(public_path('productsDolibarr/' . $dolibarrId));
        // $dbFiles = $product->images()->pluck('path')->toArray();
        //  foreach ($localFiles as $file) {
        //     $filename = $file->getFilename();

        //     $existsInDB = collect($dbFiles)->contains(function ($dbPath) use ($filename) {
        //         return $dbPath === $filename;
        //     });

        //     if (!$existsInDB) {
        //         dd($filename);
        //         $image = Image::where('path', 'LIKE', "%{$filename}")->first();
        //         dd($image);
        //         // Delete the record from the database
        //         Image::where('path', 'LIKE', "%{$filename}")->delete();
        //     }
        // }
    }


    public function removeDeletedProductsInDolibarr($products)
    {
        $dolibarrIds = array_column($products, 'id');

        $localProducts = Product::whereNotIn('dolibarr_id', $dolibarrIds)->get();

        //remove directories for non existing products
        foreach ($localProducts as $product) {
            if (File::isDirectory(public_path('productsDolibarr/' . $product->dolibarr_id))) {
                File::deleteDirectory(public_path('productsDolibarr/' . $product->dolibarr_id));
            }
        }


        Product::whereNotIn('dolibarr_id', $dolibarrIds)->delete();
    }


    public function removeUnusedImages($dolibarrId, $apiDocuments)
    {
        $localDirectory = public_path('productsDolibarr/' . $dolibarrId);

        // Ensure the directory exists
        if (!File::isDirectory($localDirectory)) {
            return;
        }

        // Get all local files in the directory
        $localFiles = File::files($localDirectory);

        // Extract filenames from the API documents
        $apiFilenames = array_column($apiDocuments, 'name');

        // Loop through local files and delete any not in the API response
        foreach ($localFiles as $file) {
            $filename = $file->getFilename();
            if (!in_array($filename, $apiFilenames)) {
                File::delete($file->getPathname());
            }
        }
    }

    private function downloadAndStoreImages(string $productRef, array $documents, string $dolibarr_id): void
    {
        $basePath = public_path('productsDolibarr/' . $dolibarr_id);

        // Create the directory if it doesn't exist
        if (!file_exists($basePath)) {
            mkdir($basePath, 0755, true);
        }

        foreach ($documents as $document) {
            // dd($document);
            try {
                // Construct the image URL
                $imageUrl = "http://192.168.1.56/api/index.php/documents/download?modulepart=product&original_file={$productRef}/{$document['name']}";

                // Fetch the image content
                $response = $this->client->get($imageUrl, [
                    'headers' => [
                        'DOLAPIKEY' => $this->apiKey,
                    ],
                ]);

                // Save the image to the local directory

                $responseData = json_decode($response->getBody(), true);
                // dd($responseData);
                if (
                    isset($responseData['filename']) &&
                    isset($responseData['content-type']) &&
                    isset($responseData['content'])
                ) {
                    // Extract file details
                    $filename = $responseData['filename'];
                    $contentType = $responseData['content-type'];
                    $fileContent = base64_decode($responseData['content']);

                    // Save the file to the local directory
                    $filePath = $basePath . '/' .  $filename;
                    // dd($filePath);
                    file_put_contents($filePath, $fileContent);

                    //
                } else {
                    //
                }
            } catch (\Exception $e) {
            }
        }
    }




    private function getProductDocuments($productId)
    {
        try {
            $response = $this->client->get("$this->baseUrl/api/index.php/documents", [
                'headers' => [
                    'DOLAPIKEY' => $this->apiKey,
                ],
                'query' => [
                    'modulepart' => 'product',
                    'id' => $productId,
                ],
            ]);

            $documents = json_decode($response->getBody(), true);

            // Return only file entries (ignore directories)
            return array_filter($documents, function ($document) {
                return $document['type'] === 'file';
            });
        } catch (RequestException $e) {
            return [];
        }
    }
}
