<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    function index()
    {
        $userId = Auth::user()->id;
        $userCart = Cart::where('userId', $userId)->get();
        // $items = [];

        // foreach ($userCart as $item) {
        //     $cartProduct = Cart::findOrFail($item);
        //     array_push($items, $cartProduct);
        // }

        return $userCart;
    }

    function store(Request $request)
    {
        $userId = Auth::user()->id;
        $productId = $request->productId;

        $productData = Product::findOrFail($productId);

        Cart::create([
            'userId' => $userId,
            'productId' =>  $productId,
            'productName' =>  $productData->name,
            'productImage' =>  $productData->image,
            'productPrice' =>  $productData->price,
        ]);

        $latest_cart_item = Cart::latest()->first();

        return $latest_cart_item;
    }
}
