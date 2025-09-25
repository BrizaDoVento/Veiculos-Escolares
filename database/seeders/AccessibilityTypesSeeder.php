<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccessibilityType;

class AccessibilityTypesSeeder extends Seeder
{
    public function run()
    {
        $types = [
            'Rampa de acesso',
            'Plataforma elevatória',
            'Espaço reservado para cadeira de rodas',
            'Assento preferencial com cinto de segurança especial',
            'Sinalização sonora interna',
            'Sinalização visual interna',
            'Cinto de segurança ajustável para todos os alunos'
        ];

        foreach ($types as $type) {
            AccessibilityType::create(['name' => $type]);
        }
    }
}
