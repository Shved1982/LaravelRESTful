<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder 
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        Eloquent::unguard();

        $this->call('UsersTableSeeder');
        $this->command->info('Users table seeded!');
        
        $this->call('MessagesTableSeeder');
        $this->command->info('Messages table seeded!');
    }

}

/**
 * Filling users table with fake data
 */
class UsersTableSeeder extends Seeder 
{

    public function run() 
    {
        DB::table('users')->delete();
        
        for ($i = (int) FALSE; $i < 1000; $i++) {
            DB::table('users')->insert([
                'username' => 'testUser' . rand(0,999), 
                'email' => 'adress' . rand(0,999) . '@gmail.com', 
                'password' => md5(rand(0,999)),
                'is_active' => rand(0,1), 
            ]);
        }
    }

}

/**
 * Filling messages table with fake data
 */
class MessagesTableSeeder extends Seeder 
{

    public function run() 
    {
        DB::table('messages')->delete();
        
        for ($i = (int) FALSE; $i < 1000; $i++) {
            $userIdTo = rand(1,1000);
            $userIdFrom = rand(1,1000);
            
            DB::table('messages')->insert([
                'user_to' => $userIdTo, 
                'user_from' => $userIdFrom, 
                'value' => 'test message from user = ' . $userIdFrom . ' to user ' . $userIdTo . '.',
                'is_active' => rand(0,1), 
            ]);
        }
    }

}
