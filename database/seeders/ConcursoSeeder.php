<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Concursos;
class ConcursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semana1 = new Concursos();
        $semana1->nombre = 'Del 29 de octubre al 31 de octubre';
        $semana1->estado = '1';
        $semana1->fecha_inicial =  '2021-10-29 23:59:59';
        $semana1->fecha_final =  '2021-10-31 23:59:59';
        $semana1->save();

        $semana2 = new Concursos();
        $semana2->nombre = 'Del 1 de octubre al 7 de noviembre';
        $semana2->estado = '0';
        $semana2->fecha_inicial =  '2021-11-01 23:59:59';
        $semana2->fecha_final =  '2021-11-07 23:59:59';
        $semana2->save();

        $semana3 = new Concursos();
        $semana3->nombre = 'Del 8 de noviembre al 14 de noviembre';
        $semana3->estado = '0';
        $semana3->fecha_inicial =  '2021-11-08 23:59:59';
        $semana3->fecha_final =  '2021-11-14 23:59:59';
        $semana3->save();

        $semana4 = new Concursos();
        $semana4->nombre = 'Del 14 de noviembre al 20 de noviembre';
        $semana4->estado = '0';
        $semana4->fecha_inicial =  '2021-11-14 23:59:59';
        $semana4->fecha_final =  '2021-11-20 23:59:59';
        $semana4->save();

        $semana5 = new Concursos();
        $semana5->nombre = 'Del 22 de noviembre al 28 de noviembre';
        $semana5->estado = '0';
        $semana5->fecha_inicial =  '2021-11-22 23:59:59';
        $semana5->fecha_final =  '2021-11-28 23:59:59';
        $semana5->save();

        $semana6 = new Concursos();
        $semana6->nombre = 'Del 29 de noviembre al 5 de diciembre';
        $semana6->estado = '0';
        $semana6->fecha_inicial =  '2021-11-29 23:59:59';
        $semana6->fecha_final =  '2021-12-05 23:59:59';
        $semana6->save();
    }
}
