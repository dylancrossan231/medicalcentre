<?php
# @Date:   2019-11-04T15:48:49+00:00
# @Last modified time: 2019-11-04T16:59:26+00:00




use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = new Role();
      $role_admin->name = 'admin';
      $role_admin->description = 'Administrator user';
      $role_admin->save();

      $role_user = new Role();
      $role_user->name = 'user';
      $role_user->description = 'Ordinary user';
      $role_user->save();

      $role_doctor = new Role();
      $role_doctor->name = 'doctor';
      $role_doctor->description = 'doctor user';
      $role_doctor->save();

      $role_patient = new Role();
      $role_patient->name = 'patient';
      $role_patient->description = 'patient user';
      $role_patient->save();
    }
}
