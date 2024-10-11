<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Kontroler::loadRaces');

$routes->get('/(:num)', 'Kontroler::loadRaceYears/$1');

$routes->get('Stage/(:num)', 'Kontroler::loadStages/$1');

$routes->get('Result/(:num)', 'Kontroler::loadResults/$1');