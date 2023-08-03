<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get('http://192.168.1.103:8000/api/items');
        $data = $response->json();

        $responseCategory = Http::get('http://192.168.1.103:8000/api/categories');
        $dataCategory = $responseCategory->json();

        return view('homepage.homepage', [
            'data' => $data,
            'dataCategory' => $dataCategory
        ]);
    }

    public function do_tambah_cart($id, Request $request)
    {
        $response = Http::get("http://192.168.1.103:8000/api/items/{$id}");
        $item = $response->json();

        if (!$item) {
            // Handle the case when the item with the given ID is not found
            return redirect()->route('homepage')->with('error', 'Item not found.');
        }

        $cartItems = Session::get('cartItems', []);
        $existingCartItem = null;

        // Check if the item is already in the cart
        foreach ($cartItems as $index => $cartItem) {
            if ($cartItem['id'] == $item['id']) {
                $existingCartItem = $cartItem;
                break;
            }
        }

        $qty = (int)$request->input('qty');
        $catatan = $request->input('catatan');

        if ($existingCartItem) {
            // If the item already exists in the cart, update its quantity and catatan
            $existingCartItem['qty'] += $qty;
            $existingCartItem['catatan'] = $catatan; // Save the catatan to the cart item
        } else {
            // If the item is not in the cart, add it as a new item
            $item['qty'] = $qty;
            $item['catatan'] = $catatan; // Save the catatan to the cart item
            $cartItems[] = $item;
        }

        // Update the cart items in the session
        Session::put('cartItems', $cartItems);

        return redirect()->route('homepage')->with('success', 'Item added to cart.');
    }

    public function removeFromCart($id): RedirectResponse
    {
        $cartItems = Session::get('cartItems', []);
        $updatedCartItems = array_filter($cartItems, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        Session::put('cartItems', $updatedCartItems);

        return redirect()->route('cartpage')->with('success', 'Item removed from cart.');
    }


}
