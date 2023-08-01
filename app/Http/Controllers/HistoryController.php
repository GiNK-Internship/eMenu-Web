<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HistoryController extends Controller
{
    public function index($id)
    {
        $response = Http::get('192.168.1.111:8000/api/tables/' . $id . '');
        $data = $response->json();

        return view('historypage.historypage', ['data' => $data]);
    }
}
