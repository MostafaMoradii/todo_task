<?php namespace Anomaly\GroceriesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\GroceriesModule\Grocery\Contract\GroceryRepositoryInterface;
use Anomaly\GroceriesModule\Grocery\GroceryRepository;
use Anomaly\Streams\Platform\Model\Groceries\GroceriesGroceriesEntryModel;
use Anomaly\GroceriesModule\Grocery\GroceryModel;
use Illuminate\Routing\Router;

class GroceriesModuleServiceProvider extends AddonServiceProvider
{
    /**
     * Additional addon plugins.
     * @type array|null
     */
    protected $plugins = [];
    /**
     * The addon Artisan commands.
     * @type array|null
     */
    protected $commands = [];
    /**
     * The addon's scheduled commands.
     * @type array|null
     */
    protected $schedules = [];
    /**
     * The addon API routes.
     * @type array|null
     */
    protected $api = [];
    /**
     * The addon routes.
     * @type array|null
     */
    protected $routes = [
        'groceries' => [
            'as' => 'anomaly.module.groceries::groceries.index',
            'uses' => 'Anomaly\GroceriesModule\Http\Controller\GroceriesController@index',
            'middleware' => 'Anomaly\GroceriesModule\Http\Middleware\AuthMiddleware',
        ],
        'groceries/show/{id}' => 'Anomaly\GroceriesModule\Http\Controller\GroceriesController@read',
        'groceries/create' => 'Anomaly\GroceriesModule\Http\Controller\GroceriesController@create',
        'groceries/edit/{id}' => 'Anomaly\GroceriesModule\Http\Controller\GroceriesController@edit',
        'groceries/delete/{id}' => 'Anomaly\GroceriesModule\Http\Controller\GroceriesController@delete',
        'admin/groceries' => 'Anomaly\GroceriesModule\Http\Controller\Admin\GroceriesController@index',
        'admin/groceries/create' => 'Anomaly\GroceriesModule\Http\Controller\Admin\GroceriesController@create',
        'admin/groceries/edit/{id}' => 'Anomaly\GroceriesModule\Http\Controller\Admin\GroceriesController@edit',
    ];
    /**
     * The addon middleware.
     * @type array|null
     */
    protected $middleware = [
        //Anomaly\GroceriesModule\Http\Middleware\ExampleMiddleware::class
    ];
    /**
     * Addon group middleware.
     * @var array
     */
    protected $groupMiddleware = [
        //'web' => [
        //    Anomaly\GroceriesModule\Http\Middleware\ExampleMiddleware::class,
        //],
    ];
    /**
     * Addon route middleware.
     * @type array|null
     */
    protected $routeMiddleware = [];
    /**
     * The addon event listeners.
     * @type array|null
     */
    protected $listeners = [
        //Anomaly\GroceriesModule\Event\ExampleEvent::class => [
        //    Anomaly\GroceriesModule\Listener\ExampleListener::class,
        //],
    ];
    /**
     * The addon alias bindings.
     * @type array|null
     */
    protected $aliases = [
        //'Example' => Anomaly\GroceriesModule\Example::class
    ];
    /**
     * The addon class bindings.
     * @type array|null
     */
    protected $bindings = [
        GroceriesGroceriesEntryModel::class => GroceryModel::class,
    ];
    /**
     * The addon singleton bindings.
     * @type array|null
     */
    protected $singletons = [
        GroceryRepositoryInterface::class => GroceryRepository::class,
    ];
    /**
     * Additional service providers.
     * @type array|null
     */
    protected $providers = [
        //\ExamplePackage\Provider\ExampleProvider::class
    ];
    /**
     * The addon views overrides.
     * @type array|null
     */
    protected $overrides = [
        //'streams::errors/404' => 'module::errors/404',
        //'streams::errors/500' => 'module::errors/500',
    ];
    /**
     * The addon mobile-only views overrides.
     * @type array|null
     */
    protected $mobile = [
        //'streams::errors/404' => 'module::mobile/errors/404',
        //'streams::errors/500' => 'module::mobile/errors/500',
    ];

    /**
     * Register the addon.
     */
    public function register()
    {
        // Run extra pre-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Boot the addon.
     */
    public function boot()
    {
        // Run extra post-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Map additional addon routes.
     * @param Router $router
     */
    public function map(Router $router)
    {
        // Register dynamic routes here for example.
        // Use method injection or commands to bring in services.
    }

}
