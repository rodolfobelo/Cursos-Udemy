<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $fornecedor = new Fornecedor();
        // $fornecedor->nome = 'Fornecedor 01 Teste';
        // $fornecedor->site = 'www.fornecedor01.com.br';
        // $fornecedor->uf = 'ce';
        // $fornecedor->email = 'teste@fornecedor01.com.br';
        // $fornecedor->ativo = 1;
        // $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Fornecedor 02 Teste',
            'site' => 'www.fornecedor02.com.br',
            'uf' => 'SP',
            'email' => 'teste@fornecedor02.com.br',
            'ativo' => 0
        ]);

        // DB::table('fornecedores')->insert([
        //     'nome' => 'Fornecedor 03 Teste',
        //     'site' => 'www.fornecedor03.com.br',
        //     'uf' => 'RJ',
        //     'email' => 'teste@fornecedor03.com.br',
        //     'ativo' => 1
        // ]);
    }
}
