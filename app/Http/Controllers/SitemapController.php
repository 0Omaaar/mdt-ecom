<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate an XML sitemap for all public pages.
     */
    public function index(): Response
    {
        $products = Product::select('id', 'updated_at')->get();
        $categories = Category::select('id', 'name', 'slug', 'updated_at')->get();

        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Static pages
        $staticPages = [
            ['url' => route('home'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => route('products'), 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => route('contact'), 'priority' => '0.7', 'changefreq' => 'monthly'],
        ];

        foreach ($staticPages as $page) {
            $sitemap .= "  <url>\n";
            $sitemap .= "    <loc>{$page['url']}</loc>\n";
            $sitemap .= "    <lastmod>" . Carbon::now()->toAtomString() . "</lastmod>\n";
            $sitemap .= "    <changefreq>{$page['changefreq']}</changefreq>\n";
            $sitemap .= "    <priority>{$page['priority']}</priority>\n";
            $sitemap .= "  </url>\n";
        }

        // Product pages
        foreach ($products as $product) {
            $sitemap .= "  <url>\n";
            $sitemap .= "    <loc>" . route('product', $product->id) . "</loc>\n";
            $sitemap .= "    <lastmod>" . Carbon::parse($product->updated_at)->toAtomString() . "</lastmod>\n";
            $sitemap .= "    <changefreq>weekly</changefreq>\n";
            $sitemap .= "    <priority>0.8</priority>\n";
            $sitemap .= "  </url>\n";
        }

        // Category filter pages
        foreach ($categories as $category) {
            $sitemap .= "  <url>\n";
            $sitemap .= "    <loc>" . route('products', ['category' => $category->id]) . "</loc>\n";
            $sitemap .= "    <lastmod>" . Carbon::parse($category->updated_at)->toAtomString() . "</lastmod>\n";
            $sitemap .= "    <changefreq>weekly</changefreq>\n";
            $sitemap .= "    <priority>0.7</priority>\n";
            $sitemap .= "  </url>\n";
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200)->header('Content-Type', 'application/xml');
    }
}
