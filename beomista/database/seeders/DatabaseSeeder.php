<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $data = [
        //     'TENDN'=>'nv1',
        //     'password'=>bcrypt('nhanvien1'),
        //     'QUYEN'=>'nhanvien'
        // ];
        $data = [
            'TENDN'=>'admin',
            'password'=>bcrypt('admin'),
            'QUYEN'=>'admin'
        ];
        DB::table('taikhoan')->insert($data);
    }
}
