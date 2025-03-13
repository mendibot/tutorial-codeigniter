<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombre' => 'Bebidas'
            ],
            [
                'nombre' => 'Deportes'
            ],
            [
                'nombre' => 'Electronica'
            ],
            
        ];
        $this->db->table('categorias')->insertBatch($data);
    }
}
