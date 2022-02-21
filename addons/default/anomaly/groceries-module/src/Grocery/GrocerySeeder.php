<?php namespace Anomaly\GroceriesModule\Grocery;

use Anomaly\GroceriesModule\Grocery\Contract\GroceryRepositoryInterface;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;

class GrocerySeeder extends Seeder
{
    protected $groceries;
    public function __construct(GroceryModel $groceries)
    {
        $this->groceries = $groceries;
    }

    protected $data = [
        [
            'name' => 'Ekmek',
            'slug' => 'ekmek',
            'description' => 'Normal Ekmek',
            'created_by_id' => 3
        ],
        [
            'name' => 'Su',
            'slug' => 'su',
            'description' => 'Mineral Su',
            'created_by_id' => 3
        ],
        [
            'name' => 'Test Grocery',
            'slug' => 'test_grocery',
            'description' => 'Test Grocery Test Grocery Test Grocery',
            'created_by_id' => 3
        ],
        [
            'name' => 'Test Grocery 2',
            'slug' => 'test_grocery_2',
            'description' => 'Normal Ekmek',
            'created_by_id' => 1
        ],
        [
            'name' => 'Test Grocery 3',
            'slug' => 'test_grocery_3',
            'description' => 'Test Grocery 2 Test Grocery 2 Test Grocery 2',
            'created_by_id' => 1
        ],
        [
            'name' => 'Test Grocery 4',
            'slug' => 'test_grocery_4',
            'description' => 'Test Grocery 2 Test Grocery 2 Test Grocery 2',
            'created_by_id' => 1
        ],
        [
            'name' => 'Test Grocery 5',
            'slug' => 'test_grocery_5',
            'description' => 'Test Grocery 2 Test Grocery 2 Test Grocery 2',
            'created_by_id' => 1
        ],
        [
            'name' => 'Test Grocery 6',
            'slug' => 'test_grocery_6',
            'description' => 'Test Grocery 2 Test Grocery 2 Test Grocery 2',
            'created_by_id' => 1
        ],
        [
            'name' => 'Test Grocery 7',
            'slug' => 'test_grocery_7',
            'description' => 'Test Grocery 2 Test Grocery 2 Test Grocery 2',
            'created_by_id' => 1
        ],
        [
            'name' => 'Test Grocery 8',
            'slug' => 'test_grocery_8',
            'description' => 'Test Grocery 2 Test Grocery 2 Test Grocery 2',
            'created_by_id' => 1
        ],
        [
            'name' => 'Test Grocery 9',
            'slug' => 'test_grocery_9',
            'description' => 'Test Grocery 2 Test Grocery 2 Test Grocery 2',
            'created_by_id' => 1
        ]
    ];
    public function run()
    {
        foreach ($this->data as $item) {
            $this->groceries->create($item);
        }
    }
}
