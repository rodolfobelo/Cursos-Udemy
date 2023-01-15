<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siteContato = new SiteContato();
        $siteContato->nome = 'Sistema SG';
        $siteContato->telefone = '(85) 9876-1234';
        $siteContato->email = 'contato@sg.com.br';
        $siteContato->motivo_contato = 1;
        $siteContato->mensagem = 'Seja bem-vindo ao sistema Super Gestão';
        $siteContato->save();

        SiteContato::create([
            'nome'=> 'Sistema SG - No-Reply',
            'telefone'=> '(85) 9999-9999',
            'email'=> 'no-reply@sg.com.br',
            'motivo_contato'=> 2,
            'mensagem'=> 'Essa é uma mensagem automática.'
        ]);
    }
}
