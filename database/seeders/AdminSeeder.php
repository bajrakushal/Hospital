<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date=Carbon::now();
        User::create([
            'name'=>'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'email_verified_at'=>$date,
            'role'=>'admin'
        ]);
    }
}
