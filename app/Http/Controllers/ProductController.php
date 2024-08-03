<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $others = Product::inRandomOrder()->where('id', '!=', $product->id)->limit(3)->get();
        foreach ($others as $other) {
            $other->previewUrl = $other
                ->images()
                ->where([
                    'type' => 'preview',
                    'device' => 'mobile'
                ])->first()->url;
        }

        return view('product', [
            'product' => $product,
            'mainImages' => $product->images()->where(['type' => 'main'])->get(),
            'galleryImages' => $product->images()->where(['type' => 'gallery'])->orderBy('sequence')->get(),
            'others' => $others
        ]);
    }
}
