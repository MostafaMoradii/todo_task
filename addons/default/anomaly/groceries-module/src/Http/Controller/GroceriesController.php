<?php namespace Anomaly\GroceriesModule\Http\Controller;

use Anomaly\GroceriesModule\Grocery\Form\GroceryFormBuilder;
use Anomaly\GroceriesModule\Grocery\GroceryModel;
use Anomaly\GroceriesModule\Grocery\GroceryRepository;
use Anomaly\GroceriesModule\Grocery\Table\GroceryTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserModel;
use Illuminate\Http\Request;

class GroceriesController extends PublicController
{
    protected $groceryRepository, $userRepository, $user;

    public function __construct(GroceryRepository $groceryRepository)
    {
        parent::__construct();
        $this->groceryRepository = $groceryRepository;
        $this->user = auth()->user();
    }

    public function index(Request $request)
    {
        $inputs = $request->all();
        $isAdmin = false;
        $users = [];
        $groceries = $this->groceryRepository->filter($inputs);
        $this->breadcrumbs->add('Home', '/');
        $this->breadcrumbs->add('Groceries', 'groceries');
        $this->template->set('meta_title', 'Groceries');
        if ($this->user->hasRole('admin')) {
            $isAdmin = true;
            $users = UserModel::whereHas('roles', function ($query) {
                $query->where('slug', 'user');
            });
            $users = $users->select(['username as label', 'id as value', 'id'])->get()->toArray();
        }
        return $this->view->make('anomaly.module.groceries::groceries.index',
            [
                'groceries' => $groceries,
                'is_admin' => $isAdmin,
                'users' => $users,
            ]);
    }

    /**
     * Create a new entry.
     *
     * @param GroceryFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function read($id)
    {
        $grocery = $this->groceryRepository->read($id);
        if (empty($grocery)) {
            abort(404);
        }
        $this->breadcrumbs->add('Home', '/');
        $this->breadcrumbs->add('Groceries', 'groceries');
        $this->breadcrumbs->add($grocery->name, 'groceries/show/' . $id);
        $this->template->set('meta_title', 'Groceries');
        return $this->view->make('anomaly.module.groceries::groceries.show', ['grocery' => $grocery]);
    }

    public function create()
    {
        $this->breadcrumbs->add('Home', '/');
        $this->breadcrumbs->add('Groceries', 'groceries');
        $this->breadcrumbs->add('Create a Grocery', 'groceries/create');
        $this->template->set('meta_title', 'Groceries');
        return $this->view->make('anomaly.module.groceries::groceries.create');
    }

    public function edit($id)
    {
        $grocery = $this->groceryRepository->read($id);
        if (empty($grocery)) {
            abort(404);
        }
        $this->breadcrumbs->add('Home', '/');
        $this->breadcrumbs->add('Groceries', 'groceries');
        $this->breadcrumbs->add('Edit ' . $grocery->name, 'groceries/edit/' . $id);
        $this->template->set('meta_title', 'Edit ' . $grocery->name);
        return $this->view->make('anomaly.module.groceries::groceries.edit', ['grocery' => $grocery]);
    }

    public function delete($id)
    {
        $grocery = $this->groceryRepository->read($id);
        if (empty($grocery)) {
            abort(404);
        }
        $this->groceryRepository->delete($id);
        return redirect('/groceries')->with('status', 'Grocery deleted!');;
    }
}
