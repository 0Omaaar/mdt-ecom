<?php

namespace App\Console\Commands;

use App\Http\Controllers\DolibarrController;
use Illuminate\Console\Command;

class UpdateProductsDolibarr extends Command
{

    protected $signature = 'app:update-products-dolibarr';


    protected $description = 'Update MDT Products from Dolibarr Database';

    public function handle()
    {
        $dolibarrController = app(DolibarrController::class);
        $dolibarrController->storeVisibleProductsToDatabase();
    }
}
