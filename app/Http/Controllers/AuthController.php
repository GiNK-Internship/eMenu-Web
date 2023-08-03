<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index($id)
    {
        $response = Http::get('http://192.168.1.103:8000/api/tables/' . $id . '/reservations/register');
        $data = $response->json();

        return view('registerpage.registerpage', ['data' => $data]);
    }

    public function process($id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255'
        ]);

        $response = Http::post('http://192.168.1.103:8000/api/tables/' . $id . '/reservations', $request->all());

        $data = $response->json();

        return view('welcomepage.auth', ['data' => $data]);
    }

    public function login_request($id, Request $request)
    {
        $validated = $request->validate([
            'pin' => 'required|numeric',
            'name' => 'required',
        ]);

        $pin = $request->input('pin');
        $name = $request->input('name');

        $response = Http::get('http://192.168.1.103:8000/api/tables/reservations' . $id . '/login');
        $reservationData = $response->json();

        return redirect()->route('homepage')->with('message', 'Login successful!');

    }
}
