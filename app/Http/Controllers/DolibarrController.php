<?php

namespace App\Http\Controllers;

use App\Http\Services\DolibarrService;
use Illuminate\Http\Request;

class DolibarrController extends Controller
{
    protected DolibarrService $dolibarrService;

    public function __construct(DolibarrService $dolibarrService)
    {
        $this->dolibarrService = $dolibarrService;
    }

    public function getProducts()
    {
        $products = $this->dolibarrService->getProducts();

        return response()->json($products);
    }

    public function storeVisibleProductsToDatabase(){
        $products = $this->dolibarrService->getProducts();
        $this->dolibarrService->storeVisibleProductsToDatabase($products);
        return response()->json(['message' => 'Products stored successfully']);
    }
}
