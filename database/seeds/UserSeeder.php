<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $acc = \App\CustomerAccount::create();
        factory(User::class, 10)->create()->each(function ($user) use ($acc) {
            $acc->save($user);
        });
    }
}
