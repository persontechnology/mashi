<?php

namespace Database\Seeders;

use App\Models\TipoCredito;
use Illuminate\Database\Seeder;

class TipoCreditoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['Productivo Corporativo','6,74','8,86'],
            ['Productivo Empresarial','8,95','9,89'],
            ['Productivo PYMES','9,90','11,26'],
            ['Consumo','15,95','16,77'],
            ['Educativo','8,91','9,50'],
            ['Educativo Social','5,49','7,50'],
            ['Vivienda de Interés','4,99','4,99'],
            ['Vivienda de Interés Social','4,98','4,99'],
            ['Inmobiliario','9,41','10,40'],
            ['Microcrédito Minorista','19,68','28,23'],
            ['Microcrédito de Acumulación Simple','20,27','24,89'],
            ['Microcrédito de Acumulación Ampliada','19,57','22,05'],
            ['Inversión Pública','8,58','9,33'],
            ['Socios directivos','35.08','36.00'],
        ];

        
            foreach ($tipos as $seg) {
                TipoCredito::updateOrCreate([
                    'segmento'=>$seg[0],
                    'tasa_referencial'=>str_replace(",", ".", $seg[1]),
                    'tasa_maxima'=>str_replace(",", ".", $seg[2])
                ]);        
            }
        

        
    }
}
