<?php
class SentrySeeder extends Seeder {

	public function run()
	{
        $faker = Faker\Factory::create();
        DB::table('users')->delete();
        DB::table('groups')->delete();
        DB::table('users_groups')->delete();

        // GROUP SEEDING
        $groupAdmin = Sentry::createGroup(array(
            'name'        => 'admin',
            'permissions' => array(
                'admin' => 1
            ),
        ));

        $groupMember = Sentry::createGroup(array(
            'name'        => 'member',
            'permissions' => array(
                'member' => 1
            ),
        ));


        //Admin user seeding
        $users = array();
        $users[] = Sentry::createUser(array(
            'email'       => 'admin@admin.com',
            'username'       => 'admin',
            'password'    => "admin",
            'first_name'  => 'Nguyen',
            'last_name'   => 'Hiep',
            'activated'   => 1
        ));
        //add admin user to group
        $adminGroup = Sentry::findGroupByName('admin');
        foreach($users as $user){
            $user->addGroup($adminGroup);
        }


        //member seeding
        $users = array();
        $users[] = Sentry::createUser(array(
            'id'=>16,
            'email'       => 'm1@member.com',
            'username'       => 'ngango',
            'password'    => "123123",
            'first_name'  => 'Kieu',
            'last_name'   => 'Nga',
            'activated'   => 1,
        ));


        // Add member to group member
        $mGroup = Sentry::findGroupByName('member');
        foreach($users as $user){
            $user->addGroup($mGroup);
        }

	}

}