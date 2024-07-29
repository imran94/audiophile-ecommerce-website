<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = $category->products()->orderByDesc('new')->get();
        foreach ($products as $prod) {
            $prod->previewImages = $prod->images()->where(['type' => 'preview'])->get();
        }
        return view('category', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
