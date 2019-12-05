<?php
# @Date:   2019-11-04T15:48:40+00:00
# @Last modified time: 2019-11-04T19:28:40+00:00




use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name' ,'admin')->first();
      $role_user = Role::where('name', 'user')->first();
      $role_doctor = Role::where('name', 'doctor')->first();
      $role_patient = Role::where('name', 'patient')->first();


      $admin = new User();
      $admin->first_name = 'Dylan';
      $admin->last_name = 'Admin';
      $admin->address_1 = '3 knocksinna Crescent';
      $admin->address_2 = 'Foxrock Dublin 18';
      $admin->phone_number = '0892199035';
      $admin->email = 'dylancrossan1@hotmail.com';
      $admin->password = bcrypt('secret123');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $user = new User();
      $user->first_name = 'Dylan';
      $user->last_name = 'User';
      $user->address_1 = '3 knocksinna Crescent';
      $user->address_2 = 'Foxrock Dublin 18';
      $user->phone_number = '0892199035';
      $user->email = 'dylancrossan12@hotmail.com';
      $user->password =bcrypt('secret123');
      $user->save();
      $user->roles()->attach($role_user);


      $user = new User();
      $user->first_name = 'Dylan';
      $user->last_name = 'Doctor';
      $user->address_1 = '3 knocksinna Crescent';
      $user->address_2 = 'Foxrock Dublin 18';
      $user->phone_number = '0892199035';
      $user->email = 'dylancrossan123@hotmail.com';
      $user->password =bcrypt('secret123');
      $user->save();
      $user->roles()->attach($role_doctor);

      $user = new User();
      $user->first_name = 'Dylan';
      $user->last_name = 'User';
      $user->address_1 = '3 knocksinna Crescent';
      $user->address_2 = 'Foxrock Dublin 18';
      $user->phone_number = '0892199035';
      $user->email = 'dylancrossan1234@hotmail.com';
      $user->password =bcrypt('secret123');
      $user->save();
      $user->roles()->attach($role_patient);
    }
}