<?php namespace Anomaly\GroceriesModule\Http\Controller\Admin;

use Anomaly\GroceriesModule\Grocery\Form\GroceryFormBuilder;
use Anomaly\GroceriesModule\Grocery\Table\GroceryTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class GroceriesController extends AdminController
{

    /**
     * Display an index of existing entries.
     * @param GroceryTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(GroceryTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     * @param GroceryFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(GroceryFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     * @param GroceryFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(GroceryFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
