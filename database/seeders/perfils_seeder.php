<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class perfils_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('perfils')->delete();
        for($i=0;$i<5;$i++){
          DB::table('perfils')->insert([
            'user_id'=>\rand(1,100),
            'nombre'=> Str::random(10),
            'apellidos'=>Str::random(10),
            'cAutonoma'=>Str::random(10),
            'provincia'=>Str::random(10),
            'ciudad'=>Str::random(10),
            'direccion'=>Str::random(10),
            'cPostal'=>\rand(10000,99999)
          ]);
      }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
  }
}