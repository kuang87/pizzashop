<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all()->take(8);

        return view('front.home', ['products' => $products]);
    }

    public function shop()
    {
        $products = Product::paginate(6);
        return view('front.shop', [
            'products' => $products,
        ]);
    }

    public function details(Product $product)
    {
        return view('front.product_details', ['product' => $product]);
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function category(Category $category)
    {
        $products = $category->products()->paginate(6);

        return view('front.shop', [
            'products' => $products,
        ]);
    }

}
