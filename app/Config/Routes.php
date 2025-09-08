<?php

use App\Controllers\LanguageController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/sorry/undergo/maintenance', 'Home::maintenance', ['as' => 'maintenance']);

// Language switcher
$routes->get('lang/(:segment)',     [LanguageController::class,     'switch']);

// $routes->get('lang/(:segment)', 'LanguageController::switch/$1');

// Routing for modules setup
foreach (glob(ROOTPATH . 'app/Modules/*/Config/Routes.php') as $file) {
    require $file;
}
