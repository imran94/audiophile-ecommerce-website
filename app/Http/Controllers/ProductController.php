<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('category', [
            'product' => $product,
            'mainImages' => $product->images()->where(['type' => 'main'])->get(),
            'galleryImages' => $product->images()->where(['type' => 'gallery'])->orderBy('sequence')->get(),
            'others' => Product::inRandomOrder()->where('id', '!=', 1)->limit(3)->get()
        ]);
    }
}
