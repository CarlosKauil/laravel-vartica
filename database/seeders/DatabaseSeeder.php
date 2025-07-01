<?php

namespace Database\Seeders;

/*use App\Models\User;*/
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nombre_completo' => 'Artista prueba 2',
            'email' => 'artist@gmail.com',
            'password' => Hash::make('123456'), // Encriptar la contraseña
            'id_rol' => 3, // Asegúrate de que este rol exista en la tabla 'roles'
        ]);

        /* Para ejecutarlo:  php artisan db:seed*/
    }
}
