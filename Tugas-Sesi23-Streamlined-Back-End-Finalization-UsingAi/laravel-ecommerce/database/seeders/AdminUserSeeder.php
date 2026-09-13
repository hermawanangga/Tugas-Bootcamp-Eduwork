<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'adminbunda@gmail.com'],
            [
                'name'     => 'Admin Bunda',
                'password' => Hash::make('123456789'),
                'role'     => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'adminangga@gmail.com'],
            [
                'name'     => 'Admin Angga',
                'password' => Hash::make('123456789'),
                'role'     => 'admin',
            ]
        );
    }
}
