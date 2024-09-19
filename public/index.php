<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\EmailController;
use Controllers\FtpController;
use Controllers\PdfController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);
$router->get('/enviarformulario', [PdfController::class,'pdf']);
$router->post('/email', [EmailController::class,'email']);
$router->post('/email', [EmailController::class,'email']);
$router->get('/conexion', [FtpController::class,'conexion']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
