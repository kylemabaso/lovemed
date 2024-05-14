<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Kyle',
            'last_name' => 'Mabaso',
            'id_number' => bcrypt('8609235353083'),
            'date_of_birth' => '1986-09-23',
            'email' => 'kyle@zwinotech.co.za',
            'email_verified_at' => now(),
            'is_verified' => true,
            'phone' => '+27713027024',
            'password' => bcrypt('kH3nsy0914!'),
            'gender_id' => 2,
            'language_id' => 2,
            'province_id' => 2,
            'race_id' => 1,
            'remember_token' => Str::random(10)
        ]);

        $role = Role::create(['name' => 'Kratos']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);    }
}
