<?php

use App\Officer;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultOfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first_name     = 'Officer';
        $last_name      = 'Auction';
        $email          = 'officerauction@gmail.com';
        $password       = 'officerauction';
        $phone_number   = '082210970741';

        $this->command->line("");
        $this->command->line("Create Default Officer...");
        $Officer     = Officer::where('email', $email)->first();
        $dataOfficer = [
            'id'                => Uuid::uuid4()->getHex(),
            'first_name'        => $first_name,
            'last_name'         => $last_name,
            'name'              => $first_name . ' ' . $last_name,
            'email'             => $email,
            'password'          => Hash::make($password),
            'email_verified_at' => now(),
            'phone_number'      => $phone_number,
            'level_id'          => 2 // Officer
        ];

        if (!$Officer) {
            $Officer = Officer::create($dataOfficer);
        } else {
            $Officer->update($dataOfficer);
        }

        $this->command->line(" + Email    : " .  $dataOfficer['email']);
        $this->command->line(" + Password : {$password}");
        $this->command->line("");
    }
}
