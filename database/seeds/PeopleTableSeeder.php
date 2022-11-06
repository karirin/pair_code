<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) { 
            $param = [
                'name' => 'dummy',
                'mail' => 'dummy@data',
                'age' => rand(1, 99),
            ];
            DB::table('people')->insert($param);
        }
        
    }

}
