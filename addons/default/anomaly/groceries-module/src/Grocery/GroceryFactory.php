<?php namespace Anomaly\GroceriesModule\Grocery;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroceryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var GroceryModel
     */
    protected $model = GroceryModel::class;


    /**
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        return [];
    }
}
