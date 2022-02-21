<?php namespace Anomaly\GroceriesModule;

use Anomaly\GroceriesModule\Grocery\GrocerySeeder;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;


class GroceriesModuleSeeder extends Seeder
{
    public function run()
    {
        $this->call(GrocerySeeder::class);
    }
}
