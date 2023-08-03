<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetailController extends Controller
{
    public function index($id)
    {
        $response = Http::get('192.168.1.103:8000/api/items/' . $id . '');
        $data = $response->json();

        return view('detailpage.detailpage', ['data' => $data]);
    }
}
