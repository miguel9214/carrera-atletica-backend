<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'nombre'      => 'Infantil',
                'descripcion' => 'Para niños de 10 a 11 años llenos de energía.',
                'min_age'     => 10,
                'max_age'     => 11,
                'distancia'   => '500 m',
                'premios'     => 'Premios para los 5 primeros lugares.',
                'gender'      => 'ambos',
            ],
            [
                'nombre'      => 'Prejuvenil',
                'descripcion' => 'Ideal para preadolescentes de 12 a 14 años.',
                'min_age'     => 12,
                'max_age'     => 14,
                'distancia'   => '800 m',
                'premios'     => 'Premios para los 5 primeros lugares.',
                'gender'      => 'ambos',
            ],
            [
                'nombre'      => 'Juvenil',
                'descripcion' => 'Competencia de 1 km para adolescentes de 15 a 17 años.',
                'min_age'     => 15,
                'max_age'     => 17,
                'distancia'   => '1 km',
                'premios'     => 'Sin premios monetarios; medalla de participación.',
                'gender'      => 'ambos',
            ],
            [
                'nombre'      => 'Élite Hombres',
                'descripcion' => 'Alta exigencia para corredores entrenados (hombres de 18 a 35 años).',
                'min_age'     => 18,
                'max_age'     => 35,
                'distancia'   => '10 km o 21 km',
                'premios'     => '1° $2.000.000, 2° $1.200.000, 3° $800.000; todos con medalla.',
                'gender'      => 'masculino',
            ],
            [
                'nombre'      => 'Élite Mujeres',
                'descripcion' => 'Para mujeres corredoras profesionales de 18 a 35 años.',
                'min_age'     => 18,
                'max_age'     => 35,
                'distancia'   => '8 km',
                'premios'     => '1° $1.200.000, 2° $900.000, 3° $500.000; todas con medalla.',
                'gender'      => 'femenino',
            ],
            [
                'nombre'      => 'Senior A (Hombres)',
                'descripcion' => 'Corredores hombres de 36 a 42 años.',
                'min_age'     => 36,
                'max_age'     => 42,
                'distancia'   => '6 km',
                'premios'     => '1° $800.000, 2° $500.000, 3° $300.000; todos con medalla.',
                'gender'      => 'masculino',
            ],
            [
                'nombre'      => 'Senior B (Hombres)',
                'descripcion' => 'Corredores hombres de 43 a 50 años.',
                'min_age'     => 43,
                'max_age'     => 50,
                'distancia'   => '6 km',
                'premios'     => '1° $800.000, 2° $500.000, 3° $300.000; todos con medalla.',
                'gender'      => 'masculino',
            ],
            [
                'nombre'      => 'Senior C (Hombres)',
                'descripcion' => 'Corredores hombres de 51 años en adelante.',
                'min_age'     => 51,
                'max_age'     => 120,
                'distancia'   => '6 km',
                'premios'     => '1° $800.000, 2° $500.000, 3° $300.000; todos con medalla.',
                'gender'      => 'masculino',
            ],
            [
                'nombre'      => 'Senior A (Mujer)',
                'descripcion' => 'Corredoras mujeres de 36 a 42 años.',
                'min_age'     => 36,
                'max_age'     => 42,
                'distancia'   => '6 km',
                'premios'     => '1° $800.000, 2° $500.000, 3° $300.000; todas con medalla.',
                'gender'      => 'femenino',
            ],
            [
                'nombre'      => 'Senior B (Mujer)',
                'descripcion' => 'Corredoras mujeres de 43 a 50 años.',
                'min_age'     => 43,
                'max_age'     => 50,
                'distancia'   => '6 km',
                'premios'     => '1° $800.000, 2° $500.000, 3° $300.000; todas con medalla.',
                'gender'      => 'femenino',
            ],
            [
                'nombre'      => 'Senior C (Mujer)',
                'descripcion' => 'Corredoras mujeres de 51 años en adelante.',
                'min_age'     => 51,
                'max_age'     => 120,
                'distancia'   => '6 km',
                'premios'     => '1° $800.000, 2° $500.000, 3° $300.000; todas con medalla.',
                'gender'      => 'femenino',
            ],
            [
                'nombre'      => 'Personas con discapacidad',
                'descripcion' => 'Carrera inclusiva para todas las edades; medalla y reconocimiento.',
                'min_age'     => 0,
                'max_age'     => 120,
                'distancia'   => 'Por definir',
                'premios'     => 'Todos con medalla y reconocimiento.',
                'gender'      => 'ambos',
            ],
        ];

        foreach ($categories as $data) {
            Category::updateOrCreate(
                ['nombre' => $data['nombre']],
                $data
            );
        }
    }
}

// Asegúrate de registrar este seeder en DatabaseSeeder.php:
// \$this->call(CategorySeeder::class);
