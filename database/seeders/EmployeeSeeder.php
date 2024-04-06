<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Employee;


class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
    
        foreach (range(1, 60) as $index) {
            $role = $faker->randomElement(['employee', 'condidat']); // Choix aléatoire du rôle
            $password = bcrypt($faker->password); // Générer un mot de passe haché aléatoire
    
            Employee::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'sexe' => $faker->randomElement(['femme', 'homme']),
                'date_of_birth' => $faker->date(),
                'email' => $faker->unique()->safeEmail,
                'role' => $role,
                'password' => $password,
                'city' => $faker->city,
            ]);
        }
    }
    
    
}
