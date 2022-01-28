<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AuthUserUserSeeder::class,
            AuthUserLevelSeeder::class,
            SystemPaymentAlipaySeeder::class,
            SystemRemindAliyunSeeder::class,
            SystemRemindConfigSeeder::class,
            SystemSmsAliyunSeeder::class,
            SystemSmsConfigSeeder::class,
            SystemSmsRosterSeeder::class,
            SystemSmsTemplateSeeder::class
        ]);
    }
}
