<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Doctor;
class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_doctor = Role::where('name', 'doctor')->first();

        foreach ($role_doctor->users as $user) {
          $doctor = new Doctor();
          $doctor->expertise ='Physcologist';
          $doctor->date_started = '09/09/2019';
          $doctor->user_id = $user->id;
          $doctor->save();
        }
    }
}
