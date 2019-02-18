<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Call all seeders in the proper order.
     */
    public function run()
    {
        $this->call([
            BibleReferencesTableSeeder::class,
            BibleTextsKjvTableSeeder::class,
            BibleTextsAsvTableSeeder::class
        ]);
    }
}
