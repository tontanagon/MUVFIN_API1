<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\customer;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(10)->create();

        // สร้าง Customers โดยให้ id และ email เท่ากับ User ที่สร้างไว้
        foreach ($users as $user) {
            $customerAttributes = [
                'id' => $user->id,       // ให้ id ของ Customer เท่ากับ id ของ User
                'email' => $user->email, // ให้ email ของ Customer เท่ากับ email ของ User
                // และคุณอาจเพิ่ม attributes อื่น ๆ ที่ต้องการสร้าง
            ];

            customer::factory()->create($customerAttributes);
        }
        //test1
        // $user = User::fa
       // ...................................)->create();

        // // ใช้ email จาก UserFactory
        // $customerAttributes = customer::factory()->raw(['email' => $user->email]);

        // // สร้าง Customer โดยให้ email เท่ากับ email ของ User
        // customer::create($customerAttributes);
        // $users = User::factory()->count(10)->create();

        // foreach ($users as $user) {
        //     customer::factory()->for($user)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}



