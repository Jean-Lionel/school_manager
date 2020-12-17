<?php

namespace Database\Seeders;

use App\Models\Etablissement;
use App\Models\Level;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('etablissements')->truncate();
        DB::table('sections')->truncate();
        DB::table('levels')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $etablissement = Etablissement::create(['name' => 'SAINT GABRIELLE']);

        $section = Section::create([
        	'name' => 'SECONDAIRE',
        	'etablissement_id' => $etablissement->id

        ]);


        for($i = 1; $i<=10; $i++)
        {
        	Level::create([
        		'name' => $i,
        		'section_id' => $section->id
        	]);
        }
    }
}
