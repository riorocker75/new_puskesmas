<?php

namespace Database\Seeders;

use App\Models\Poli;
use Illuminate\Database\Seeder;
use DB;
class Poli_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('poli')->delete();
        Poli::create([
          'id' => 1,
          'prosedur' => "POLI ANAK"
        ]);
          Poli::create([
          'id' => 2,
          'prosedur' => "POLI KANDUNGAN"
        ]);  Poli::create([
          'id' => 3,
          'prosedur' => "POLI GIzi"
        ]);  Poli::create([
          'id' => 4,
          'prosedur' => "POLI UMUM"
        ]);
          Poli::create([
          'id' => 5,
          'prosedur' => "POLI GIGI"
        ]);

    }
}
