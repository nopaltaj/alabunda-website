<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get(); 

        // memanggil product dengan galeri
        $product = Product::latest()->get();

        return view('frontend.landing', compact('category', 'product'));
    }

    public function detailCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $text     = Category::findOrFail($category->id)->name;
        $title    = "Detail Category - $text";
        $product     = Product::where('category_id', $category->id)->paginate(10);
        $nav_category = Category::all();
        $side_news    = Product::inRandomOrder()->limit(4)->get();

        return view('frontend.landing', compact(
            'title',
            'news',
            'nav_category',
            'side_news'
        ));
    }
}