<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class productos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->delete();
        for($i=0;$i<5;$i++){
          DB::table('productos')->insert([
            'imagen'=> Str::random(10),
            'stock'=>\rand(1,100),
            'precio'=>\rand(1,100)
          ]);
      }
    }
}
