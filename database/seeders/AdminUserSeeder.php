<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * DEVELOPMENT DEFAULT ADMIN ACCOUNT.
     *
     * -----------------------------------------------------------------------
     * This account exists ONLY for local development. It is created through
     * the seeder on purpose and there is NO public registration flow that can
     * create or promote a user to administrator.
     *
     *   email:    admin@dipanshu.dev
     *   password: Admin@12345
     *
     * Change the password and/or role before deploying to any public
     * environment. The password is NOT displayed anywhere in the frontend.
     * -----------------------------------------------------------------------
     *
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'admin@dipanshu.dev';

        $user = User::query()->where('email', $email)->first();

        if ($user === null) {
            User::query()->create([
                'name' => 'Dipanshu Verma',
                'email' => $email,
                'password' => Hash::make('Admin@12345'),
            ]);

            // "is_admin" is intentionally NOT in the model's $fillable list, so
            // we use forceFill (which bypasses mass-assignment protection) here
            // in the controlled seeder context only.
            $user = User::query()->where('email', $email)->first();
            $user->forceFill(['is_admin' => true]);
            $user->save();
        } else {
            $user->forceFill(['is_admin' => true]);
            $user->save();
        }
    }
}