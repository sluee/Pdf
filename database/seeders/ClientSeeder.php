<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::factory(30)->create();

        $cl = [
            [
                'last_name' => 'Gabas',
                'first_name' => 'Eula',
                'middle_name' => 'Requierme',
                'address' => 'Sta. Cruz, Sagbayan, Bohol',
                'birth_date' => '2002-06-24',
                'phone_number' => '09505514775',
                'email' => 'eulagabas28@gmail.com',
                'initial_deposit' => '10000'
            ],
            [
                'last_name' => 'Gabs',
                'first_name' => 'Slue',
                'middle_name' => 'Reqs',
                'address' => ' Sagbayan, Bohol',
                'birth_date' => '2002-06-24',
                'phone_number' => '09467137867',
                'email' => 'eulagabas00@gmail.com',
                'initial_deposit' => '10000'

            ],

        ];

        foreach($cl as $c) {
            Client::create($c);
        }
    }

}
