<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/Lembaga', 'Home::lembaga');
$routes->get('/Lembaga/(:segment)', 'Home::blog_detail/lembaga/$1');
$routes->get('/Layanan', 'Home::layanan');
$routes->get('/Layanan/(:segment)', 'Home::blog_detail/layanan/$1');
$routes->get('/Inventaris', 'Home::inventaris');
$routes->get('/Inventaris/(:segment)', 'Home::blog_detail/inventaris/$1');
$routes->get('/Tausiyah', 'Home::tausiyah');
$routes->get('/Tausiyah/(:segment)', 'Home::blog_detail/tausiyah/$1');
$routes->get('/Agenda', 'Home::agenda');
$routes->get('/Agenda/(:segment)', 'Home::blog_detail/agenda/$1');

$routes->group('Login', static function (RouteCollection $routes) {
  $routes->get('Operator', 'OperatorLogin::index');
  $routes->post('Operator', 'OperatorLogin::auth');
  $routes->get('Operator/Keluar', 'OperatorLogin::logoff');
});

$routes->group('OperatorPanel', function (RouteCollection $routes) {
  $routes->get('/', 'PanelController::index');
  $routes->get('Lembaga', 'PanelController::lembaga');
  $routes->post('Lembaga', 'PanelController::lembaga_insert');
  $routes->post('Lembaga/Update', 'PanelController::lembaga_update');
  $routes->get('Lembaga/Delete/(:segment)', 'PanelController::lembaga_delete/$1');

  $routes->get('Jabatan', 'PanelController::jabatan');
  $routes->post('Jabatan', 'PanelController::jabatan_insert');
  $routes->post('Jabatan/Update', 'PanelController::jabatan_update');
  $routes->get('Jabatan/Delete/(:segment)', 'PanelController::jabatan_delete/$1');


  $routes->get('Layanan', 'PanelController::layanan');
  $routes->post('Layanan', 'PanelController::layanan_insert');
  $routes->post('Layanan/Update', 'PanelController::layanan_update');
  $routes->get('Layanan/Delete/(:segment)', 'PanelController::layanan_delete/$1');

  $routes->get('Inventaris', 'PanelController::inventaris');
  $routes->post('Inventaris', 'PanelController::inventaris_insert');
  $routes->post('Inventaris/Update', 'PanelController::inventaris_update');
  $routes->get('Inventaris/Delete/(:segment)', 'PanelController::inventaris_delete/$1');


  $routes->get('Agenda', 'PanelController::agenda');
  $routes->post('Agenda', 'PanelController::agenda_insert');
  $routes->post('Agenda/Update', 'PanelController::agenda_update');
  $routes->get('Agenda/Delete/(:segment)', 'PanelController::agenda_delete/$1');

  $routes->get('Tausiyah', 'PanelController::tausiyah');
  $routes->post('Tausiyah', 'PanelController::tausiyah_insert');
  $routes->post('Tausiyah/Update', 'PanelController::tausiyah_update');
  $routes->get('Tausiyah/Delete/(:segment)', 'PanelController::tausiyah_delete/$1');

  $routes->get('Keuangan', 'PanelController::infaq');
  $routes->get('Keuangan/(:segment)', 'PanelController::keuangan/$1');
  $routes->post('Keuangan', 'PanelController::infaq_insert');
  $routes->post('Keuangan/Update', 'PanelController::infaq_update');
  $routes->get('Keuangan/Delete/(:segment)', 'PanelController::infaq_delete/$1');

  $routes->get('Corousel', 'PanelController::corousel');
  $routes->post('Corousel', 'PanelController::corousel_insert');
  $routes->get('Corousel/Delete/(:segment)', 'PanelController::corousel_delete/$1');
});
