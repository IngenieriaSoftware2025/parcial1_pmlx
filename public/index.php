<?php 
require_once __DIR__ . '/../includes/app.php';

use Controllers\LibroController;
use Controllers\PrestamoController;
use MVC\Router;
use Controllers\AppController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

// INDEX-INICIO
$router->get('/', [AppController::class,'index']);

// LIBROCONTROLLER
$router->get('/libros', [LibroController::class, 'renderizarPagina']);


//PRESTAMOSCONTROLLER
$router->get('/prestamos', [LibroController::class, 'renderizarPagina']);

// LIBROS 
$router->post('/libros/guardarAPI', [LibroController::class, 'guardarAPI']);
$router->get('/libros/buscarAPI', [LibroController::class, 'buscarAPI']);
$router->post('/libros/modificarAPI', [LibroController::class, 'modificarAPI']);
$router->get('/libros/eliminar', [LibroController::class, 'EliminarAPI']);

// PRESTAMO
$router->post('/prestamos/guardarAPI', [PrestamoController::class, 'guardarAPI']);
$router->get('/prestamos/buscarAPI', [PrestamoController::class, 'buscarAPI']);
$router->post('/prestamos/modificarAPI', [PrestamoController::class, 'modificarAPI']);
$router->get('/prestamos/eliminar', [PrestamoController::class, 'EliminarAPI']);
$router->get('/prestamos/devolver', [PrestamoController::class, 'devolverAPI']);

$router->comprobarRutas();