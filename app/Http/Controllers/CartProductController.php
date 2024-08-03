<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartProductController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'productId' => 'required',
            'quantity' => 'required|integer|numeric',
            'cartId' => 'nullable|integer|numeric'
        ]);

        $cart = Cart::find($request->input('cartId'));
        if ($cart === null) {
            $cart = new Cart;
            $cart->save();
        }
        $product = $cart->products()->where('product_id', $request->input('productId'))->first();
        if ($product != null) {
            $cart->products()->updateExistingPivot(
                $product->cartProduct->product_id,
                ['quantity' => $product->cartProduct->quantity + $request->input('quantity')]
            );
        } else {
            $cart->products()->attach(
                $request->input('productId'),
                ['quantity' => $request->input('quantity')]
            );
            $product = Product::find($request->input('productId'));
        }
        $cart->total = $cart->products()->get()->reduce(
            function (?int $carry, Product $prod) {
                return $carry + $prod->price * $prod->cartProduct->quantity;
            }
        );
        $cart->save();

        return response(Cart::with(['products' => [
            'images' => function ($q) {
                $q->where(['type' => 'preview', 'device' => 'mobile']);
            }
        ]])->find($cart->id));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'productId' => 'required',
            'quantity' => 'required|integer|numeric',
        ]);

        $cart = Cart::find($id);
        if ($cart === null) {
            return response([], 404);
        }

        if ($request->input('quantity') <= 0) {
            $cart->products()->detach(
                $request->input('productId')
            );
        } else {
            $product = $cart->products()->where('product_id', $request->input('productId'))->first();
            if ($product != null) {
                $cart->products()->updateExistingPivot(
                    $product->cartProduct->product_id,
                    ['quantity' => $request->input('quantity')]
                );
            } else {
                $cart->products()->attach(
                    $request->input('productId'),
                    ['quantity' => $request->input('quantity')]
                );
                $product = Product::find($request->input('productId'));
            }
        }
        $cart->total = $cart->products()->get()->reduce(
            function (?int $carry, Product $prod) {
                return $carry + $prod->price * $prod->cartProduct->quantity;
            }
        ) ?? 0;
        $cart->save();

        return response(Cart::with(['products' => [
            'images' => function ($q) {
                $q->where(['type' => 'preview', 'device' => 'mobile']);
            }
        ]])->find($cart->id));
    }

    public function removeAll(string $id)
    {
        Cart::find($id)?->products()->detach();

        return response(Cart::with(['products' => [
            'images' => function ($q) {
                $q->where(['type' => 'preview', 'device' => 'mobile']);
            }
        ]])->find($id));
    }
}
