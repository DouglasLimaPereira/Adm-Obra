<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EstadoTableSeeder::class,
            IconeTableSeeder::class,
            UserTableSeeder::class,
            CompanyTableSeeder::class,
            ModuloTableSeeder::class,
            PermissoesTableSeeder::class,
            PerfilTableSeeder::class,
            UnidademedidaTableSeeder::class,
            //CanteiroTableSeeder::class,
        ]);
    }
}
