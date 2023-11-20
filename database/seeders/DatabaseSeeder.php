<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Posts;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'id' => 1,
            'name' => 'John Thor',
            'email' => 'john.thor@emai.com',
            'password' => '123',
        ]);

        Posts::factory()->create([
            'id' => 1,
            'user_id' => 1,
            'title' => 'PHP is Good',
            'content' => 'PHP with Laravel is Awesome',
            'is_admin' => 0,
        ]);

        Posts::factory()->create([
            'id' => 2,
            'user_id' => 1,
            'title' => 'PHP with Laravel',
            'content' => 'This is the content',
            'is_admin' => 0,
        ]);

        User::factory()->create([
            'id' => 2,
            'name' => 'John Lee',
            'email' => 'john.lee@email.com',
            'password' => '456',
        ]);

        Posts::factory()->create([
            'id' => 3,
            'user_id' => 2,
            'title' => 'Javascript with React',
            'content' => 'React best frontend',
            'is_admin' => 0,
        ]);

        Posts::factory()->create([
            'id' => 4,
            'user_id' => 2,
            'title' => 'C with Tailwind',
            'content' => 'Tailwind peak Backend',
            'is_admin' => 0,
        ]);

        User::factory()->create([
            'id' => 3,
            'name' => 'John Doe',
            'email' => 'john.doe@email.com',
            'password' => '789',
        ]);

        Posts::factory()->create([
            'id' => 5,
            'user_id' => 3,
            'title' => 'Python better C',
            'content' => 'Sepuh Python',
            'is_admin' => 0,
        ]);

        Posts::factory()->create([
            'id' => 6,
            'user_id' => 3,
            'title' => 'Genshin Impact',
            'content' => 'Gacha Hell',
            'is_admin' => 0,
        ]);
    }
}
