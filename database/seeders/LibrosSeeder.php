<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Libro;

class LibrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Libro::create([
            'nombre' => 'La Sombra del Viento',
            'autor' => 'Carlos Ruiz Zafón',
            'editorial' => 'Penguin Random House',
            'pub_year' => 2001,
            'precio' => 29.99,
            'descripcion' => 'Una novela misteriosa que sigue la vida de un joven librero en la posguerra en Barcelona.',
            'categoria' => 1,
            'imagen' => 'public/img/libro1.jpg'
        ]);

        Libro::create([
            'nombre' => 'Cien años de soledad',
            'autor' => 'Gabriel García Márquez',
            'editorial' => 'Editorial Sudamericana',
            'pub_year' => 1967,
            'precio' => 24.99,
            'descripcion' => 'Una obra maestra de realismo mágico que narra la historia de la familia Buendía en Macondo.',
            'categoria' => 2,
            'imagen' => 'public/img/libro1.jpg'
        ]);

        Libro::create([
            'nombre' => 'Harry Potter y la Piedra Filosofal',
            'autor' => 'J.K. Rowling',
            'editorial' => 'Bloomsbury Publishing',
            'pub_year' => 1997,
            'precio' => 19.99,
            'descripcion' => 'El inicio de la famosa serie de Harry Potter, que sigue las aventuras del joven mago en Hogwarts.',
            'categoria' => 3,
            'imagen' => 'public/img/libro1.jpg'
        ]);

        Libro::create([
            'nombre' => '1984',
            'autor' => 'George Orwell',
            'editorial' => 'Secker & Warburg',
            'pub_year' => 1949,
            'precio' => 21.99,
            'descripcion' => 'Una novela distópica que presenta una visión sombría de un futuro totalitario.',
            'categoria' => 4,
            'imagen' => 'public/img/libro1.jpg'
        ]);

        Libro::create([
            'nombre' => 'To Kill a Mockingbird',
            'autor' => 'Harper Lee',
            'editorial' => 'J.B. Lippincott & Co.',
            'pub_year' => 1960,
            'precio' => 18.99,
            'descripcion' => 'Un clásico de la literatura estadounidense que aborda temas de raza e injusticia en el sur de los Estados Unidos.',
            'categoria' => 5,
            'imagen' => 'public/img/libro1.jpg'
        ]);
    }
}
