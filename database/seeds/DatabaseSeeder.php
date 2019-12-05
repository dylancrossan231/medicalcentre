<?php
# @Date:   2019-11-04T15:17:10+00:00
# @Last modified time: 2019-11-04T23:17:41+00:00




use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DoctorTableSeeder::class);
        $this->call(PatientTableSeeder::class);
        $this->call(VisitTableSeeder::class);


    }
}
