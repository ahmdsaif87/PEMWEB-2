<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class homepageController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $product = Products::with('category')->get();

        return view('web.homepage', [
            'categories' => $categories,
            'products' => $product,
        ]);
    }
    public function products()
    {
        $products = Products::with('category')->paginate(12); // tampilkan 12 produk per halaman
        return view('web.products', [
            'products' => $products,
        ]);
    }

    public function categories()
    {
        $categories = Categories::all();
        return view('web.category', [
            'categories' => $categories,
        ]);
    }

    public function category($slug)
    {
        $category = Categories::with('products')->where('slug', $slug)->firstOrFail();

        return view('web.category_by_slug', [
            'category' => $category,
        ]);
    }


    public function cart()
    {
        return view('web.cart');
    }
    public function checkout()
    {
        return view('web.checkout');
    }
}
