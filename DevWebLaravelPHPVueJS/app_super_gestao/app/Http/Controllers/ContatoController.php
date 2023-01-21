<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use Symfony\Component\Console\Input\Input;

class ContatoController extends Controller
{
    public function contato(Request $request){

        // echo '<pre>';
        // print_r($request->all());
        // $nome = $request->input('nome');
        // echo "nome: $nome";

        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email

        return view('site.contato', ['titulo' => 'Contato']);
    }
}


telefone
email
motivo_contato