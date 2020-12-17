<?php

use App\Models\Etablissement;
use Illuminate\Database\Seeder;

class EtablissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Etablissement::create(['name' => 'SAINT GABRIELLE']);
    }
}
