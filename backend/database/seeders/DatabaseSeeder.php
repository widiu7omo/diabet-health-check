<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@adm.com',
            'password' => bcrypt('admin'),
        ]);
        Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        Role::create(['name' => 'Dokter', 'guard_name' => 'web']);
        Role::create(['name' => 'Pasien', 'guard_name' => 'web']);
        $user->syncRoles("Admin");
    }
}
