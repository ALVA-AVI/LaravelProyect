<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Category::insert([
            ['name' => "Noticias", 'module' => 1, 'slug' => "noticias"],
            ['name' => "Registros",'module' => 2, 'slug' => "registros"],
            ['name' => "Solicitudes", 'module' => 2, 'slug' => "solicitudes"],
            ['name' => "Banner", 'module' => 1, 'slug' => "banner"],
        ]);
    }
}
