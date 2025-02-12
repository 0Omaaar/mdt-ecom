<?php

namespace App\Http\Services;

use App\Models\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

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


    public function storeVisibleProductsToDatabase($products)
    {
        // dd($products);
        foreach ($products as $product) {
            try {
                // Map API data to database fields
                $data = [
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

                // Save or update the product based on SKU
                Product::updateOrCreate(
                    ['sku' => $data['sku']],
                    $data
                );



            } catch (\Exception $e) {
                 $e->getMessage();
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
