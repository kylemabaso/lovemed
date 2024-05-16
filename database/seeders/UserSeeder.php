<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Language;
use App\Models\Gender;
use App\Models\Province;
use App\Models\Race;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Fetch all the gender, language, province, and race IDs
        $genderIds = Gender::all()->pluck('id')->toArray();
        $languageIds = Language::all()->pluck('id')->toArray();
        $provinceIds = Province::all()->pluck('id')->toArray();
        $raceIds = Race::all()->pluck('id')->toArray();

        // Array of unique names and emails
        $names = [
            ['first_name' => 'Asande', 'last_name' => 'Ndlela', 'email_prefix' => 'aserandlela'],
            ['first_name' => 'Sidwell', 'last_name' => 'Bombwe', 'email_prefix' => 'sidwellb'],
            ['first_name' => 'Lerato', 'last_name' => 'Mogale', 'email_prefix' => 'leratom'],
            ['first_name' => 'Thembi', 'last_name' => 'Nkosi', 'email_prefix' => 'thembink'],
            ['first_name' => 'Peter', 'last_name' => 'Smith', 'email_prefix' => 'peters'],
            ['first_name' => 'Dwayne', 'last_name' => 'Johnson', 'email_prefix' => 'dwayne'],
            ['first_name' => 'Julia', 'last_name' => 'Roberts', 'email_prefix' => 'julia'],
            ['first_name' => 'Nandi', 'last_name' => 'Zulu', 'email_prefix' => 'nandiz'],
            ['first_name' => 'Sipho', 'last_name' => 'Mkhize', 'email_prefix' => 'siphom'],
            ['first_name' => 'Mary', 'last_name' => 'Jane', 'email_prefix' => 'maryj']
        ];

        // Roles array
        $roles = ['Admin', 'Doctor', 'Patient', 'Pharmacist'];

        foreach ($names as $index => $name) {
            $dob = Carbon::createFromTimestamp(rand(strtotime('1980-01-01'), strtotime('2000-12-31')));
            $genderId = $genderIds[array_rand($genderIds)];
            $isMale = Gender::find($genderId)->name === 'Male';

            $genderSequence = $isMale ? rand(5000, 9999) : rand(0, 4999);
            $citizenStatus = rand(0, 1);
            $partialId = $dob->format('ymd') . sprintf('%04d', $genderSequence) . $citizenStatus;
            $checksum = $this->calculateLuhnChecksum($partialId);
            $saIdNumber = $partialId . $checksum;

            $uniqueEmail = $name['email_prefix'] . ($index + 1) . '@gmail.com';

            $user = User::create([
                'first_name' => $name['first_name'],
                'last_name' => $name['last_name'],
                'id_number' => $saIdNumber,
                'date_of_birth' => $dob->format('Y-m-d'),
                'language_id' => $languageIds[array_rand($languageIds)],
                'gender_id' => $genderId,
                'province_id' => $provinceIds[array_rand($provinceIds)],
                'race_id' => $raceIds[array_rand($raceIds)],
                'email' => $uniqueEmail,
                'email_verified_at' => now(),
                'is_verified' => true,
                'phone' => '+27' . rand(100000000, 999999999),
                'password' => bcrypt('Password123!'),
                'remember_token' => Str::random(10)
            ]);

            // Assign roles based on index to cycle through the list of roles
            $user->assignRole($roles[$index % count($roles)]);
        }
    }

    private function calculateLuhnChecksum($number)
    {
        $digits = str_split($number);
        $total = 0;
        $length = count($digits);

        for ($i = 0; $i < $length; $i++) {
            $digit = (int) $digits[$length - $i - 1];
            if ($i % 2 == 0) { // Double every second digit
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            $total += $digit;
        }

        return (10 - ($total % 10)) % 10;
    }
}