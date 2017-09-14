<?php

use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = file_get_contents(__DIR__.'/propinsi.sql');
        $sql = explode(';', $data);

        for ($i=0; $i < count($data); $i++) { 
        	DB::unprepared($sql[$i]);
        
        }
        
    }
}