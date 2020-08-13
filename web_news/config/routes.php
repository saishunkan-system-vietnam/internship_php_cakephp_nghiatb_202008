<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    // $builder->registerMiddleware('csrf', new CsrfProtectionMiddleware([
    //     'httpOnly' => true,
    // ]));

    /*
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered through `Application::routes()` with `registerMiddleware()`
     */
    // $builder->applyMiddleware('csrf');

    $builder->connect('/', ['controller' => 'Blogs', 'action' => 'index']);

    // $builder->connect('/blogs/select/{id}', ['controller' => 'Blogs', 'action' => 'select']);
    // $builder->connect('/blogs/search/{id}', ['controller' => 'Blogs', 'action' => 'search']);

    $builder->connect('/users', ['controller' => 'Users', 'action' => 'index']);

    $builder->connect('/categories', ['controller' => 'Categories', 'action' => 'index']);

    $builder->connect('/articles', ['controller' => 'Articles', 'action' => 'index']);

    // $builder->connect('/articles/publish/{id}', ['controller' => 'Articles', 'action' => 'publish']);
    
    $builder->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    
    $builder->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);

    // $builder->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $builder->fallbacks();
});

// Router::prefix('Admin', ['_namePrefix' => 'admin:'], function (RouteBuilder $routes) {
//     $routes->connect('/', ['controller' => 'Admin', 'action' => 'index']);
    // $routes->fallbacks();
// });