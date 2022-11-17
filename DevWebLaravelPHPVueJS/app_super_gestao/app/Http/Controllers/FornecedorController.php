<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '00',
                'ddd' => 85,
                'telCelular' => 987654321
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => '765.543.0001/95-87',
                'ddd' => 85,
                'telCelular' => 912456789
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => '712.123.0001/43-123',
                'ddd' => 85,
                'telCelular' => 912456789
            ]
        ];        

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}