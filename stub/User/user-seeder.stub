<?php

namespace Src\Domain\User\Database\Seeds;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Src\Domain\User\Entities\User;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        User::create([
            'name' => $faker->name,
            'email' => 'admin@MohamedReda.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::factory(1000)->create();
    }
}
