<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HistoryController extends Controller
{
    public function index($id)
    {
        $response = Http::get('192.168.1.109:8000/api/tables/' . $id . '/items');
        $data = $response->json();

        $responseTable = Http::get('http://192.168.1.109:8000/api/tables/' . $id . '/reservations');
        $dataTable = $responseTable->json();

        return view('historypage.historypage', [
            'data' => $data,
            'dataTable' => $dataTable
        ]);
    }
}
