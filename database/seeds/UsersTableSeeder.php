<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $adminRole = Role::where('name', 'author')->first();
        $adminRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'name' => Hash::make('password')

        ]);
        
        $author = User::create([
            'name' => 'Author User',
            'email' => 'author@author.com',
            'name' => Hash::make('password')

        ]);
        
        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'name' => Hash::make('password')

        ]);
        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
