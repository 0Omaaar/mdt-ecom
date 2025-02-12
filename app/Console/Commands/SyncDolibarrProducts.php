<?php

namespace App\Console\Commands;

use App\Http\Services\DolibarrService;
use App\Models\Productdolibarr;
use Illuminate\Console\Command;


class SyncDolibarrProducts extends Command
{
    protected $signature = 'sync:dolibarr-products';
    protected $description = 'Sync products from Dolibarr to the eCommerce application';

    protected $dolibarrService;

    public function __construct(DolibarrService $dolibarrService)
    {
        parent::__construct();
        $this->dolibarrService = $dolibarrService;
    }
    public function handle()
    {
        $products = $this->dolibarrService->getProducts();

        // Check if products are fetched successfully
        if (empty($products)) {
            $this->error('No products found in Dolibarr.');
            return;
        }

        // Display products in a table format
        $headers = ['ID', 'Ref', 'Label'];
        $rows = [];

        foreach ($products as $product) {
            $rows[] = [
                'ID' => $product['id'] ?? 'N/A',
                'Ref' => $product['ref'] ?? 'N/A',
                'Label' => $product['label'] ?? 'N/A',
            ];
        }

        $this->table($headers, $rows);

        // Optionally, sync products to the database
        // foreach ($products as $product) {
        //     Productdolibarr::updateOrCreate(
        //         ['dolibarr_id' => $product['id']],
        //         [
        //             'ref' => $product['ref'],
        //             'label' => $product['label'],
        //         ]
        //     );
        // }

        $this->info('Products synced successfully!');
    }
}
