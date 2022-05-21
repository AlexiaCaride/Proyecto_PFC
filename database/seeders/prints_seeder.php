<?php

namespace Database\Seeders;

use App\Models\Prints;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class prints_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('prints')->delete();
        for($i=0;$i<5;$i++){
            DB::table('prints')->insert([
            'producto_id'=>\rand(1,100),
              'tamano'=> Str::random(10)
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
