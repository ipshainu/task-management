<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create(['name' => 'Admin User', 'email' => 'admin@example.com', 'password' => Hash::make('123456'), 'dob' => '1987-10-27']);
    
        app()['cache']->forget('spatie.permission.cache');

        $role = Role::create(['guard_name' => 'web', 'name' => 'admin']);
        $user->assignRole('admin');

        $role = Role::create(['guard_name' => 'web', 'name' => 'normal user']);
        
        $this->call(TaskSeeder::class);
    }
}
