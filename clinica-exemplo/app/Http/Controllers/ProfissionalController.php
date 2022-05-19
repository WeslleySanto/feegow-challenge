<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Input\Input;

class ProfissionalController extends Controller
{
    public function index(Request $request) {
        $response = Http::withHeaders([
            'x-access-token' => env('ACCESS_TOKEN'),
        ])
        ->get('https://api.feegow.com/v1/api/professional/list', ['especialidade_id' => $request->especialidade]);
        
        $profissionais = $response->json()['content'];
        // dd($profissionais);
        $total = $response->json()['total'];

        return view('profissionais', compact('profissionais', 'total'));
    }

}
