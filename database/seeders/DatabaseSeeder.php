<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Manager',
            'level' => 1,
            'email' => 'manager@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'permissions' => [
                'menu.create' => true,
                'menu.edit' => true,
                'menu.delete' => true,
                'menu.export' => true,
            ],
        ]);
        User::factory(300)->create();
        Menu::factory(10)->create();

        $ids = Menu::pluck('id')->toArray();
        $users = User::get();
        foreach ($users as $user) {
            $user->menu()->attach($ids[array_rand($ids)]);
        }
    }
}
