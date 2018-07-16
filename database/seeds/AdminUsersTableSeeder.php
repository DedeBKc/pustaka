<?php

use Illuminate\Database\Seeder;
use App\AdminUser;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new AdminUser();
        $user->name = "Admin";
        $user->email = "admin@gmail.com";
        $user->password = crypt("root123", "");
        $user->save();

        $user1 = new AdminUser();
        $user1->name = "DedeBKc";
        $user1->email = "dedebkc@gmail.com";
        $user1->password = crypt("root123", "");
        $user1->save();
    }
}
