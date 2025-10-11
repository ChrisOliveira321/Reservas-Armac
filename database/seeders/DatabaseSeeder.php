<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Colaborador;
use App\Models\Hotel;
use App\Models\Cidade;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Colaboradores
        Colaborador::insert([
            ['nome' => 'Anderson Luis Pinheiro Conde Nunes'],
            ['nome' => 'Lauro Lares Lemes'],
            ['nome' => 'Diego Rodrigo Alves'],
            ['nome' => 'Douglas Antonello Colpo'],
            ['nome' => 'Elisleis Gomes Santana'],
            ['nome' => 'Ilson de Farias'],
            ['nome' => 'Jaime Veiga'],
            ['nome' => 'José Adalberto Mota da Silva'],
            ['nome' => 'Leonardo Veloso Martins Soares Dillelio'],
            ['nome' => 'Renato Gonçalves Vasconcelos de Souza'],
        ]);

        // Hotéis
        Hotel::insert([
            ['nome' => 'Hotel Marechal'],
            ['nome' => 'Hotel Westphal'],
            ['nome' => 'Zaz Hotéis Ltda'],
            ['nome' => 'Hotel Califórnia'],
            ['nome' => 'Hotel Rivems'],
        ]);

        // Cidades
        Cidade::insert([
            ['nome' => 'Curitiba - PR'],
            ['nome' => 'Ponta Grossa - PR'],
            ['nome' => 'Maringá - PR'],
            ['nome' => 'Londrina - PR'],
            ['nome' => 'Sarandi - PR'],
            ['nome' => 'Santa Catarina - PR'],
            ['nome' => 'Reserva - PR'],
            ['nome' => 'Rio Negro - PR'],
            ['nome' => 'Lapa - PR'],
            ['nome' => 'Jaraguá do Sul - SC'],
            ['nome' => 'São Bento do Sul - SC'],
            ['nome' => 'Corupá - SC'],
            ['nome' => 'Mafra - SC'],
            ['nome' => 'Cruz Alta - RS'],
            ['nome' => 'Porto Alegre - RS'],
            ['nome' => 'São Gabriel - RS'],
            ['nome' => 'Pelotas - RS'],
            ['nome' => 'Canoas - RS'],
        ]);
    }
}
