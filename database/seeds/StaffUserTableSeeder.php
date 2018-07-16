<?php

use Illuminate\Database\Seeder;
use \App\Staff;
class StaffUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Staff();
        $user->name = "Mulyasir";
        $user->slug = str_slug("Mulyasir", $separator = '-');
        $user->email = "mulyasir@gmail.com";
        $user->image = "mulyasir.png";
        $user->password = crypt("root123", "");
        $user->save();

        $user1 = new Staff();
        $user1->name = "Shawqi";
        $user1->slug = str_slug("Shawqi", $separator = '-');
        $user1->email = "shawqi@gmail.com";
        $user1->image = "shawqi.png";
        $user1->password = crypt("root123", "");
        $user1->save();

        $user2 = new Staff();
        $user2->name = "Yudi Andika";
        $user2->slug = str_slug("Yudi Andika", $separator = '-');
        $user2->email = "yudi@gmail.com";
        $user2->image = "yudi.png";
        $user2->password = crypt("root123", "");
        $user2->save();

        $user3 = new Staff();
        $user3->name = "Muksalmina";
        $user3->slug = str_slug("Muksalmina", $separator = '-');
        $user3->email = "mina76@gmail.com";
        $user3->image = "muksalmina.png";
        $user3->password = crypt("root123", "");
        $user3->save();

        $user4 = new Staff();
        $user4->name = "Hilman";
        $user4->slug = str_slug("Hilman", $separator = '-');
        $user4->email = "hilman@gmail.com";
        $user4->password = crypt("root123", "");
        $user4->save();
    }
}
