<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Routing for modules setup
foreach(glob(ROOTPATH. 'App/Modules/*/Config/Routes.php') as $file){
    require $file;
}