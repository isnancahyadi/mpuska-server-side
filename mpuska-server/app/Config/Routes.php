<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

$routes->addRedirect('/', 'home');

$routes->resource('restapi/akun');
$routes->resource('restapi/mahasiswa');
$routes->resource('restapi/dosen');
$routes->resource('restapi/matakuliah');
$routes->resource('restapi/pengampu');
$routes->resource('restapi/matakuliahkonv');
$routes->resource('restapi/krs');
$routes->resource('restapi/asesmen');
$routes->resource('restapi/capaian');
$routes->resource('restapi/capaianmk');

$routes->post('restapi/khs/getlistmhs/(:num)', 'RestApi\Khs::getListMhs/$1');
$routes->get('restapi/khs/getscoremhs/(:num)', 'RestApi\Khs::getScoreMhs/$1');
$routes->get('restapi/khs/getassessment/(:num)', 'RestApi\Khs::getAssessment/$1');
$routes->get('restapi/khs/getcpl/(:num)', 'RestApi\Khs::getcpl/$1');
$routes->get('restapi/khs/getcpmk/(:num)', 'RestApi\Khs::getcpmk/$1');
$routes->put('restapi/khs/updatescoremhs/(:num)', 'RestApi\Khs::updateScoreMhs/$1');
$routes->put('restapi/khs/updateassessments/(:num)', 'RestApi\Khs::updateAssessments/$1');
$routes->post('restapi/khs/getlistkhsmhs/(:num)', 'RestApi\Khs::getListKhsMhs/$1');
$routes->post('restapi/khs/addassessment/(:num)', 'RestApi\Khs::addAssessment/$1');
$routes->get('restapi/khs/searchcourse/(:num)', 'RestApi\Khs::searchCourse/$1');
$routes->get('restapi/khs/searchmhsincourseconv/(:num)', 'RestApi\Khs::searchMhsInCourseConv/$1');
$routes->get('restapi/khs/getkonversion/(:num)', 'RestApi\Khs::getKonversion/$1');
$routes->post('restapi/khs/addkhsconv', 'RestApi\Khs::addKhsConv');
$routes->post('restapi/khs/getachievements/(:num)', 'RestApi\Khs::getAchievements/$1');
$routes->post('restapi/khs/getachievementsscore/(:num)', 'RestApi\Khs::getAchievementsScore/$1');
$routes->post('restapi/khs/addachievements', 'RestApi\Khs::addAchievements');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
