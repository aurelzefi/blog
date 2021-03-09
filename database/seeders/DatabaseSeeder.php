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
        $user = User::factory()->create([
            'name' => 'Aurel Zefi',
            'email' => 'aurelzefi1994@gmail.com',
        ]);

        Post::factory(rand(0, 5))->for($user)->create();

        User::factory(10)->create()->each(function (User $user) {
            Post::factory(rand(0, 5))->for($user)->create();
        });
    }
}
