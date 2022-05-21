<?php

namespace Database\Seeders;

use App\Models\Camiseta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class camisetas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('camisetas')->delete();
        for($i=0;$i<5;$i++){
          DB::table('camisetas')->insert([
            'producto_id'=>\rand(1,100),
            'talla'=> Str::random(3),
            'color'=>Str::random(10),
          ]);
      }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
