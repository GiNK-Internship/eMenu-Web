<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetailController extends Controller
{
    public function index($id)
    {
        $response = Http::get('http://192.168.1.106:8000/api/detailItem/' . $id . '');
        $data = $response->json();

        return view('detailpage.detailpage', ['data' => $data]);
    }
}
