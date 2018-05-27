<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'principal';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8

//TALLER MECANICO - API
//CLIENTES
$route['api/taller/clientes/(:num)'] = 'api/taller/clientes/id/$1'; // 
$route['api/taller/clientes/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/taller/clientes/id/$1/format/$3$4'; //RECIBE PARAMETROS PARA ELEGIR UN FORMATO DISTINTO DE RESPUESTA
//MIS VEHICULOS
$route['api/taller/misvehiculos/(:num)'] = 'api/taller/misvehiculos/id/$1/';
$route['api/taller/misvehiculos/(:num)/(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/taller/misvehiculos/id/$1/format/$3$4';

//VEHICULOS
$route['api/taller/vehiculos/(:num)'] = 'api/taller/vehiculos/id/$1';
$route['api/taller/vehiculos/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/taller/vehiculos/id/$1/format/$3$4'; //RECIBE PARAMETROS PARA ELEGIR UN FORMATO DISTINTO DE RESPUESTA

//MECANICOS
$route['api/taller/mecanicos/(:num)'] = 'api/taller/mecanicos/id/$1'; // 
$route['api/taller/mecanicos/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/taller/mecanicos/id/$1/format/$3$4'; //RECIBE PARAMETROS PARA ELEGIR UN FORMATO DISTINTO DE RESPUESTA


$route['login'] = 'Principal/login';
$route['logout'] = 'Principal/logout';
$route['portada'] = 'Principal/portada';
$route['mis_indicadores'] = 'Principal/mis_indicadores';
$route['clientes'] = 'Principal/todos_los_clientes';
$route['clientes/(:num)'] = 'Principal/cliente/$1';
$route['clientes/agregar'] = 'Principal/agregar_cliente/';
$route['clientes/(:num)/editar'] = 'Principal/editar_cliente/$1';
$route['clientes/(:num)/borrar'] = 'Principal/eliminar_cliente/$1';
$route['vehiculos'] = 'Principal/todos_los_vehiculos';
$route['mecanicos'] = 'Principal/todos_los_mecanicos';
$route['mecanicos/(:num)'] = 'Principal/mecanico/$1';
$route['mecanicos/agregar'] = 'Principal/agregar_mecanico/';
$route['mecanicos/(:num)/editar'] = 'Principal/editar_mecanico/$1';
$route['mecanicos/(:num)/borrar'] = 'Principal/eliminar_mecanico/$1';
$route['vehiculo/(:num)'] = 'Principal/ver_vehiculo/$1';
$route['vehiculo/agregar'] = 'Principal/agregar_vehiculo/';
$route['vehiculo/(:num)/editar'] = 'Principal/editar_vehiculo/$1';
$route['vehiculo/(:num)/borrar'] = 'Principal/eliminar_vehiculo/$1';
$route['indicador/(:num)/agregar'] = 'Principal/agregar_evolucion/$1';
$route['indicador/(:num)/(:num)/editar'] = 'Principal/editar_evolucion/$1/$2';