<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/sorry/undergo/maintenance', 'Home::maintenance', ['as' => 'maintenance']);

// Routing for modules setup
foreach(glob(ROOTPATH. 'app/Modules/*/Config/Routes.php') as $file){
    require $file;
}