<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
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
        $users = User::factory()->createMany([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
            ],
            [
                'name' => 'Aurel Zefi',
                'email' => 'aurelzefi1994@gmail.com',
            ],
        ]);

        User::factory(10)->create()->merge($users)->each(function (User $user) {
            Post::factory(rand(1, 10))->for($user)->create();
        });
    }
}
