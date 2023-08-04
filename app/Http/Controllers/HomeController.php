<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HomeController extends Controller
{
    public function index($id)
    {
        $response = Http::get('http://192.168.1.113:8000/api/items');
        $data = $response->json();

        $responseCategory = Http::get('http://192.168.1.113:8000/api/categories');
        $dataCategory = $responseCategory->json();

        $responseTable = Http::get('http://192.168.1.113:8000/api/tables/' . $id . '/reservations');
        $dataTable = $responseTable->json();

        return view('homepage.homepage', [
            'data' => $data,
            'dataCategory' => $dataCategory,
            'dataTable' => $dataTable
        ]);
    }

    public function do_tambah_cart($id, Request $request)
    {
        $response = Http::get("http://192.168.1.113:8000/api/items/{$id}");
        $item = $response->json();

        $table_id = $request->input('table_id');

        $responseTable = Http::get('http://192.168.1.113:8000/api/tables/' . $table_id . '/reservations');
        $dataTable = $responseTable->json();

        if (!$item) {
            return redirect()->route('homepage')->with('error', 'Item not found.');
        }

        $cartItems = Session::get('cartItems', []);
        $existingCartItem = null;

        foreach ($cartItems as $index => $cartItem) {
            if ($cartItem['id'] == $item['id']) {
                $existingCartItem = $cartItem;
                break;
            }
        }

        $qty = (int)$request->input('qty');
        $catatan = $request->input('catatan');

        if ($existingCartItem) {
            $existingCartItem['qty'] += $qty;
            $existingCartItem['catatan'] = $catatan;
        } else {
            $item['qty'] = $qty;
            $item['catatan'] = $catatan;
            $cartItems[] = $item;
        }

        Session::put('cartItems', $cartItems);

        return redirect()->to('homepage/' . $dataTable['table_id'])->with('success', 'Item added to cart.');
    }

    public function removeFromCart($id)
    {
        $cartItems = Session::get('cartItems', []);
        $updatedCartItems = [];

        foreach ($cartItems as $cartItem) {
            if ($cartItem['id'] != $id) {
                $updatedCartItems[] = $cartItem;
            }
        }

        Session::put('cartItems', $updatedCartItems);

        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}
