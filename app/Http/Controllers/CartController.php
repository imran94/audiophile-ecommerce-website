<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getById(string $id)
    {
        if (!Cart::where('id', $id)->exists()) {
            return response(null, 404);
        }

        return response(Cart::with(['products' => [
            'images' => function ($q) {
                $q->where(['type' => 'preview', 'device' => 'mobile']);
            }
        ]])->find($id));
    }

    public function showCheckout(string $id)
    {
        $cart = Cart::with(['products' => [
            'images' => function ($q) {
                $q->where(['type' => 'preview', 'device' => 'mobile']);
            }
        ]])->find($id);
        if ($cart === null || $cart->products()->count() === 0) {
            return redirect()->route('home');
        }

        return view('checkout', [
            'cart' => $cart
        ]);
    }

    public function completeCheckout(string $id)
    {
        Cart::destroy($id);
        return response([]);
    }
}
