<?php

namespace App\Http\Controllers;

use App\Http\Services\DolibarrService;
use Exception;
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
        try {
            $products = $this->dolibarrService->getProducts();
            return view('admin.settings.dolibarr.products', compact('products'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getProductDetails($id)
    {
        try {
            $product = $this->dolibarrService->getProductDetails($id);
            return view('admin.settings.dolibarr.product', compact('product'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function storeVisibleProductsToDatabase()
    {
        try {
            $products = $this->dolibarrService->getProducts();
            $this->dolibarrService->storeVisibleProductsToDatabase($products);
            return redirect()->back()->with('success', 'Products stored successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
