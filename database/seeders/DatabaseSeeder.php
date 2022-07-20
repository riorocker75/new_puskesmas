<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          $this->call(User_seed::class);
          $this->call(Pegawai_seed::class);
          $this->call(Poli_seed::class);

    }
}
