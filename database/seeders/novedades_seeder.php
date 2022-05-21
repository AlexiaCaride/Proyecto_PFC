<?php

namespace Database\Seeders;

use App\Models\Novedades;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class novedades_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('novedades')->delete();
        for($i=0;$i<5;$i++){
          DB::table('novedades')->insert([
            'user_id'=> \rand(1,100),
            'titulo'=>Str::random(10),
            'descripcion'=>Str::random(10),
            'imagen'=>Str::random(10),
            'ruta'=>Str::random(10),
          ]);
      }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
