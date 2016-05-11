<?php

use App\Association;
use App\Club;
use App\User;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return  void
     */

    public function run()
    {

        Club::truncate();

        $naucali_presidente = factory(User::class)->create(
            ['name' => 'naucali_President',
                'email' => 'naucali@aikem.com',
                'role_id' => Config::get('constants.ROLE_CLUB_PRESIDENT'),
                'password' => bcrypt('naucali'),
                'verified' => 1,]);

        factory(Club::class,5)->create();



        factory(Club::class)->create(
            ['association_id' => 6,
                'president_id' => $naucali_presidente->id,
                'name' => 'Naucali'
            ]);
    }
}
