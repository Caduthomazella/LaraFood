<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::Create([
            'name' => 'Businers',
            'url' => 'businers',
            'price' => '499.99',
            'description' => 'Plano Empresarial',
        ]);
    }
}
