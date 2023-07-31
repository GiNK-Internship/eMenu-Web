<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get('http://192.168.1.106:8000/api/items');
        $data = $response->json();

        $responseCategory = Http::get('http://192.168.1.106:8000/api/categories');
        $dataCategory = $responseCategory->json();

        return view('homepage.homepage', [
            'data' => $data,
            'dataCategory' => $dataCategory
        ]);
    }
}
