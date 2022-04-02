<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('marche')->delete();
        $makes = array(
            array('id' =>1 , 'nome' => 'Acura'),
            array('id' =>2 , 'nome' => 'Alfa Romeo'),
            array('id' =>3 , 'nome' => 'AMC'),
            array('id' =>4 , 'nome' => 'Aston Martin'),
            array('id' =>5 , 'nome' => 'Audi'),
            array('id' =>6 , 'nome' => 'Avanti'),
            array('id' =>7 , 'nome' => 'Bentley'),
            array('id' =>8 , 'nome' => 'BMW'),
            array('id' =>9 , 'nome' => 'Buick'),
            array('id' =>10 , 'nome' => 'Cadillac'),
            array('id' =>11 , 'nome' => 'Chevrolet'),
            array('id' =>12 , 'nome' => 'Chrysler'),
            array('id' =>13 , 'nome' => 'Daewoo'),
            array('id' =>14 , 'nome' => 'Daihatsu'),
            array('id' =>15 , 'nome' => 'Datsun'),
            array('id' =>16 , 'nome' => 'DeLorean'),
            array('id' =>17 , 'nome' => 'Dodge'),
            array('id' =>18 , 'nome' => 'Eagle'),
            array('id' =>19 , 'nome' => 'Ferrari'),
            array('id' =>20 , 'nome' => 'FIAT'),
            array('id' =>21 , 'nome' => 'Fisker'),
            array('id' =>22 , 'nome' => 'Ford'),
            array('id' =>23 , 'nome' => 'Freightliner'),
            array('id' =>24 , 'nome' => 'Geo'),
            array('id' =>25 , 'nome' => 'GMC'),
            array('id' =>26 , 'nome' => 'Honda'),
            array('id' =>27 , 'nome' => 'HUMMER'),
            array('id' =>28 , 'nome' => 'Hyundai'),
            array('id' =>29 , 'nome' => 'Infiniti'),
            array('id' =>30 , 'nome' => 'Isuzu'),
            array('id' =>31 , 'nome' => 'Jaguar'),
            array('id' =>32 , 'nome' => 'Jeep'),
            array('id' =>33 , 'nome' => 'Kia'),
            array('id' =>34 , 'nome' => 'Lamborghini'),
            array('id' =>35 , 'nome' => 'Lancia'),
            array('id' =>36 , 'nome' => 'Land Rover'),
            array('id' =>37 , 'nome' => 'Lexus'),
            array('id' =>38 , 'nome' => 'Lincoln'),
            array('id' =>39 , 'nome' => 'Lotus'),
            array('id' =>40 , 'nome' => 'Maserati'),
            array('id' =>41 , 'nome' => 'Maybach'),
            array('id' =>42 , 'nome' => 'Mazda'),
            array('id' =>43 , 'nome' => 'McLaren'),
            array('id' =>44 , 'nome' => 'Mercedes-Benz'),
            array('id' =>45 , 'nome' => 'Mercury'),
            array('id' =>46 , 'nome' => 'Merkur'),
            array('id' =>47 , 'nome' => 'MINI'),
            array('id' =>48 , 'nome' => 'Mitsubishi'),
            array('id' =>49 , 'nome' => 'Nissan'),
            array('id' =>50 , 'nome' => 'Oldsmobile'),
            array('id' =>51 , 'nome' => 'Peugeot'),
            array('id' =>52 , 'nome' => 'Plymouth'),
            array('id' =>53 , 'nome' => 'Pontiac'),
            array('id' =>54 , 'nome' => 'Porsche'),
            array('id' =>55 , 'nome' => 'RAM'),
            array('id' =>56 , 'nome' => 'Renault'),
            array('id' =>57 , 'nome' => 'Rolls-Royce'),
            array('id' =>58 , 'nome' => 'Saab'),
            array('id' =>59 , 'nome' => 'Saturn'),
            array('id' =>60 , 'nome' => 'Scion'),
            array('id' =>61 , 'nome' => 'smart'),
            array('id' =>62 , 'nome' => 'SRT'),
            array('id' =>63 , 'nome' => 'Sterling'),
            array('id' =>64 , 'nome' => 'Subaru'),
            array('id' =>65 , 'nome' => 'Suzuki'),
            array('id' =>66 , 'nome' => 'Tesla'),
            array('id' =>67 , 'nome' => 'Toyota'),
            array('id' =>68 , 'nome' => 'Triumph'),
            array('id' =>69 , 'nome' => 'Volkswagen'),
            array('id' =>70 , 'nome' => 'Volvo'),
            array('id' =>71 , 'nome' => 'Yugo'),
            array('id' =>72 , 'nome' => 'Pagani')
          );
        DB::table('marche')->insert($makes);
    }
    
}
