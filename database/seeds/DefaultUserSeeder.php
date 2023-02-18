<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first_name     = 'Luthfi';
        $last_name      = 'Hakim';
        $email          = 'luthfyhakim250404@gmail.com';
        $password       = 'luthfyhakim';
        $phone_number   = '085335249308';

        $this->command->line("");
        $this->command->line("Create Default User...");
        $user     = User::where('email', $email)->first();
        $dataUser = [
            'first_name'        => $first_name,
            'last_name'         => $last_name,
            'name'              => $first_name . ' ' . $last_name,
            'email'             => $email,
            'password'          => Hash::make($password),
            'email_verified_at' => now(),
            'phone_number'      => $phone_number,
            'term_of_use'       => 'on'
        ];

        if (!$user) {
            $user = User::create($dataUser);
        } else {
            $user->update($dataUser);
        }

        $this->command->line(" + Email    : " .  $dataUser['email']);
        $this->command->line(" + Password : {$password}");
        $this->command->line("");
    }
}
