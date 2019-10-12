<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //先关闭外键约束
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();
        DB::table('orders')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(\App\User::class,30)->create()->each(function ($user){
            $orders=factory(\App\Order::class,3)->make();
            $user->orders()->saveMany($orders);

        });


    }
}
