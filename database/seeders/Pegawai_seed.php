<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Pegawai;
use DB;
use Carbon\Carbon;
class Pegawai_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawai')->delete();
        Pegawai::create([
          'id' => 1,
          'nip' => 1232123142,
          'nama' => "Sumail",
          'tanggal_lahir' =>  Carbon::now()->format('Y-m-d'),
          'status'=> 1
        ]);
           Pegawai::create([
          'id' => 2,
          'nip' => 456656568,
          'nama' => "Nurhalimah",
          'tanggal_lahir' =>  Carbon::now()->format('Y-m-d'),
          'status'=> 1
        ]);
    }
}
