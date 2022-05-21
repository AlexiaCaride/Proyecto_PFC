<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class pedidos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('pedidos')->delete();
        for($i=0;$i<5;$i++){
          DB::table('pedidos')->insert([
            'user_id'=> \rand(1,100),
            'total'=>\rand(1,100)
          ]);
      }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
