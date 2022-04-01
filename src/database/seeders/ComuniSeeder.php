<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ComuniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comuni')->delete();


        $comuni = array(
            array('id' =>1, 'regione' =>'Abruzzo', 'provincia' => 'Teramo', 'comune' => 'Atri'),
            array('id' =>2, 'regione' =>'Abruzzo', 'provincia' =>'Teramo', 'comune' => 'Pineto'),
            array('id' =>3, 'regione' =>'Abruzzo', 'provincia' =>'Teramo', 'comune' => 'Roseto degli Abruzzi'),
            array('id' =>4, 'regione' =>'Abruzzo', 'provincia' =>'Teramo', 'comune' => 'Giulianova'),
            array('id' =>5, 'regione' =>'Abruzzo', 'provincia' =>'Teramo', 'comune' => 'Silvi Marina'),
            array('id' =>6, 'regione' =>'Abruzzo', 'provincia' =>'Pescara', 'comune' => 'Pescara'),
            array('id' =>7, 'regione' =>'Abruzzo', 'provincia' =>'Pescara', 'comune' => 'Montesilvano'),
            array('id' =>8, 'regione' =>'Abruzzo', 'provincia' =>'Pescara', 'comune' => 'Spoltore')
        );


        DB::table('comuni')->insert($comuni);
    }
}
