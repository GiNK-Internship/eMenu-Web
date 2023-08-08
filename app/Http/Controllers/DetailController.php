<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetailController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');
        $table_id = $request->input('table_id');

        $response = Http::get('192.168.1.113:8000/api/items/' . $id . '');
        $data = $response->json();

        $responseTable = Http::get('http://192.168.1.113:8000/api/tables/' . $table_id . '/reservations');
        $dataTable = $responseTable->json();

        return view('detailpage.detailpage', [
            'data' => $data,
            'dataTable' => $dataTable
        ]);
    }
}
