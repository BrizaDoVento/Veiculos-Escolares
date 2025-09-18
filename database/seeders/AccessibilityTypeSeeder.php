<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AccessibilityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $types = [
        'Nenhuma',
        'Rampa para cadeiras de rodas',
        'Elevador / Lift',
        'Piso baixo',
    ];

    foreach ($types as $type) {
        \App\Models\AccessibilityType::create(['name' => $type]);
    }
}
}
