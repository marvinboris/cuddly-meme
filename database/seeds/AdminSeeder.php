<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete(); // Using truncate function so all info will be cleared when re-seeding.
		DB::table('roles')->truncate();
		DB::table('role_users')->truncate();
		DB::table('activations')->truncate();

		$now = \Carbon\Carbon::now();

        $file_id = DB::table('files')->insertGetId([
            'filename' => 'admin_logo.jpg',
            'mime' => 'image/jpeg'
        ]);

        $cv_file_id = DB::table('files')->insertGetId([
            'filename' => 'admin_cv.jpg',
            'mime' => 'image/jpeg'
        ]);

		$admin = Sentinel::registerAndActivate(array(
			'email'       => 'admin@localhost.com',
			'password'    => 'admin',
			'first_name'  => 'John',
            'last_name'   => 'Doe',
            'birthdate'   => $now->toDateString(),
            'sex'         => 'M',
            'activity_area_id' => DB::table('activity_areas')->first()->id,
            'specialization' => 'Administrator',
            'phone'       => 672345678,
            'social_link1' => 'facebook.com',
            'city_id'      => $file_id,
            'cv_file_id'   => $cv_file_id
		));

		$adminRole = Sentinel::getRoleRepository()->createModel()->create([
			'name' => 'Admin',
			'slug' => 'admin',
			'permissions' => array('admin' => 1),
		]);

		Sentinel::getRoleRepository()->createModel()->create([
			'name'  => 'User',
			'slug'  => 'user',
		]);

		$admin->roles()->attach($adminRole);

		$this->command->info('Admin User created with username admin@localhost.com and password admin');
    }
}
