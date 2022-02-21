<?php namespace Anomaly\GroceriesModule\Grocery;

use Anomaly\GroceriesModule\Grocery\Contract\GroceryRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class GroceryRepository extends EntryRepository implements GroceryRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var GroceryModel
     */
    protected $model, $user;

    /**
     * Create a new GroceryRepository instance.
     *
     * @param GroceryModel $model
     */
    public function __construct(GroceryModel $model)
    {
        $this->model = $model;
        $this->user = auth()->user();
    }

    public function filter($inputs)
    {
        $grocery = $this->model;
        if (!$this->user->hasRole('admin')) {
            $grocery = $grocery->where('created_by_id', $this->user->id);
        }
        if (!empty($inputs['user_id'])) {
            $grocery = $grocery->where('created_by_id', $inputs['user_id']);
        }
        if (!empty($inputs['search'])) {
            $grocery = $grocery->where('name', 'LIKE', '%' . $inputs['search'] . '%');
        }
        return $grocery->paginate(5);
    }

    public function read($id)
    {
        $grocery = $this->model->find($id);
        if (!$this->user->hasRole('admin')) {
            $grocery = $this->model->where('created_by_id', $this->user->id)->find($id);
        }
        if (empty($grocery)) {
            abort(404);
        }
        return $grocery;
    }

    public function delete($id)
    {
        $grocery = $this->read($id);
        return $grocery->delete();
    }
}
