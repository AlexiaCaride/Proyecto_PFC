<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class usuarios_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        DB::table('users')->delete();
        for($i=0;$i<5;$i++){
          DB::table('users')->insert([
            'tipo'=> Str::random(10),
            'name'=>Str::random(10),
            'email'=>Str::random(10).'@prueba.com',
            'password'=>Hash::make('Abcd1234.')
          ]);
      }
      }  
    
}
