<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Visit;
use App\Doctor;
class VisitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_patient = Role::where('name', 'patient')->first();
        $role_doctor = Role::where('name', 'doctor')->first();
        $doctors = $role_doctor->users;

        foreach($role_patient->users as $user) {
            $doctor = $doctors[rand(0, count($doctors) -1)];
            $visit = new Visit();
            $visit->cost='60';
            $visit->duration = '1 hour';
            $visit->patient_id = $user->patient->id;
            $visit->doctor_id = $doctor->doctor->id;
            $visit->save();


    }
}
}
