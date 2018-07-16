<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user1 = new User;
        $user2 = new User;
        $user3 = new User;
        $user4 = new User;

        $user->nim = 39578934;
        $user->name = 'Sayed';
        $user->slug = str_slug('Sayed', $separator = '-');
        $user->email = 'sayed@gmail.com';
        $user->password = bcrypt('root123');
        $user->created_at = \Carbon\Carbon::now('Asia/Jakarta');
        $user->remember_token = bcrypt('root123');
        $user->save();

        $user1->nim = 89982918;
        $user1->name = 'Mukti';
        $user1->slug = str_slug('Mukti', $separator = '-');
        $user1->email = 'mukti@gmail.com';
        $user1->password = bcrypt('root123');
        $user1->created_at = \Carbon\Carbon::now('Asia/Jakarta');
        $user1->remember_token = bcrypt('root123');
        $user1->save();

        $user2->nim = 11020192;
        $user2->name = 'Clara';
        $user2->slug = str_slug('Clara', $separator = '-');
        $user2->email = 'clara@gmail.com';
        $user2->password = bcrypt('root123');
        $user2->created_at = \Carbon\Carbon::now('Asia/Jakarta');
        $user2->remember_token = bcrypt('root123');
        $user2->save();

        $user3->nim = 38829222;
        $user3->name = 'Ronaldo';
        $user3->slug = str_slug('Ronaldo', $separator = '-');
        $user3->email = 'ronaldo@gmail.com';
        $user3->password = bcrypt('root123');
        $user3->created_at = \Carbon\Carbon::now('Asia/Jakarta');
        $user3->remember_token = bcrypt('root123');
        $user3->save();

        $user4->nim = 78228371;
        $user4->name = 'Modric';
        $user4->slug = str_slug('Modric', $separator = '-');
        $user4->email = 'modric@gmail.com';
        $user4->password = bcrypt('root123');
        $user4->created_at = \Carbon\Carbon::now('Asia/Jakarta');
        $user4->remember_token = bcrypt('root123');
        $user4->save();

        $faker = Faker\Factory::create('id_ID');

        $limit = 15;

        for ($i = 0; $i < $limit; $i++) {
            $users = new User;
            $users->nim = $faker->randomNumber(8, false);
            $users->name = $faker->unique()->name;
            $users->slug = str_slug($faker->unique()->name, $separator = '-');
            $users->email = $faker->unique()->freeEmail;
            $users->password = bcrypt('root123');
            $users->created_at = \Carbon\Carbon::now('Asia/Jakarta');
            $users->remember_token = bcrypt('root123');
            $users->save();
        }
    }
}
