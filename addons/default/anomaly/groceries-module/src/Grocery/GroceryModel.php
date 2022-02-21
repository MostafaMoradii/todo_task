<?php namespace Anomaly\GroceriesModule\Grocery;

use Anomaly\GroceriesModule\Grocery\Contract\GroceryInterface;
use Anomaly\Streams\Platform\Model\Groceries\GroceriesGroceriesEntryModel;
use Anomaly\UsersModule\User\UserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroceryModel extends GroceriesGroceriesEntryModel implements GroceryInterface
{
    use HasFactory;

    /**
     * @return GroceryFactory
     */
    protected static function newFactory()
    {
        return GroceryFactory::new();
    }
    /**
     * The eager loaded relationships.
     *
     * @var array
     */
    protected $with = [
        'user',
    ];
    public function user() {
        return $this->belongsTo(UserModel::class, 'created_by_id');
    }
}
