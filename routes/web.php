<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('clientes', App\Http\Controllers\ClienteController::class);
Route::put('cliente/estado/{id}', [App\Http\Controllers\ClienteController::class, 'updateEstado'])->name('clientes.updateEstado');

Route::resource('tarjetas', App\Http\Controllers\TarjetaController::class);

Route::resource('peliculas', App\Http\Controllers\PeliculaController::class);
Route::put('peliculas/estado/{id}', [App\Http\Controllers\PeliculaController::class, 'updateEstado'])->name('peliculas.updateEstado');

Route::resource('categorias', App\Http\Controllers\CategoriaController::class);

Route::resource('tipos-peliculas', App\Http\Controllers\TipoPeliculaController::class);

Route::resource('alquiler', App\Http\Controllers\AlquilerController::class);

Route::get('/cliente/home', [App\Http\Controllers\HomeClienteController::class, 'index'])->middleware('auth:tarjetas')->name('home-cliente');

Route::get('cliente/login', [App\Http\Controllers\LoginClienteController::class, 'index'])->name('login-cliente');
Route::post('cliente/login', [App\Http\Controllers\LoginClienteController::class, 'store'])->name('login-cliente.store');
Route::post('cliente/logout', [App\Http\Controllers\LoginClienteController::class, 'logout'])->name('logout-cliente');

Route::get('/cliente/recarga', [App\Http\Controllers\RecargaClienteController::class, 'index'])->middleware('auth:tarjetas')->name('cliente-recarga');
Route::post('/cliente/recarga', [App\Http\Controllers\RecargaClienteController::class, 'recargar'])->middleware('auth:tarjetas')->name('cliente-recarga');

Route::get('/cliente/historial/{id}', [App\Http\Controllers\RecargaClienteController::class, 'historial'])->middleware('auth:tarjetas')->name('cliente-historial');
Route::get('/cliente/movimientos/{id}', [App\Http\Controllers\RecargaClienteController::class, 'movimientos'])->middleware('auth:tarjetas')->name('cliente-movimientos');

Route::get('/cliente/perfil', [App\Http\Controllers\PerfilClienteController::class, 'index'])->middleware('auth:tarjetas')->name('cliente-perfil');

Route::get('/cliente/peliculas', [App\Http\Controllers\PeliculaClienteController::class, 'index'])->middleware('auth:tarjetas')->name('cliente-peliculas');

Route::post('/cliente/cart-add', [App\Http\Controllers\CartClienteController::class, 'add'])->middleware('auth:tarjetas')->name('cart-add');
Route::get('/cliente/cart-checkout', [App\Http\Controllers\CartClienteController::class, 'cart'])->middleware('auth:tarjetas')->name('cart-checkout');
Route::post('/cliente/cart-clear', [App\Http\Controllers\CartClienteController::class, 'clear'])->middleware('auth:tarjetas')->name('cart-clear');
Route::post('/cliente/cart-removeitem', [App\Http\Controllers\CartClienteController::class, 'removeitem'])->middleware('auth:tarjetas')->name('cart-removeitem');

Route::get('/cliente/alquiler', [App\Http\Controllers\ClienteAlquilerController::class, 'index'])->middleware('auth:tarjetas')->name('cliente-alquiler');
Route::post('/cliente/alquiler', [App\Http\Controllers\ClienteAlquilerController::class, 'store'])->middleware('auth:tarjetas')->name('cliente-alquiler-store');

Route::get('/cliente/mis-alquileres', [App\Http\Controllers\ClienteAlquilerController::class, 'mialquiler'])->middleware('auth:tarjetas')->name('cliente-mis-alquileres');
Route::post('/cliente/mis-alquileres', [App\Http\Controllers\ClienteAlquilerController::class, 'filtrarmialquiler'])->middleware('auth:tarjetas')->name('cliente-mis-alquileres-filtrar');

Route::get('/cliente/email/{id}', [App\Http\Controllers\MailController::class, 'sendEmail'])->middleware('auth:tarjetas')->name('cliente-email');
Route::get('/cliente/email/credenciales/{id}', [App\Http\Controllers\MailController::class, 'sendEmailCredenciales'])->middleware('auth')->name('cliente-email-credenciales');
Route::get('/cliente/email/credenciales/update/{id}', [App\Http\Controllers\MailController::class, 'sendEmailCredencialesUpdate'])->middleware('auth')->name('cliente-email-credenciales-update');


Route::get('/reporte/link', [App\Http\Controllers\ReporteController::class, 'link'])->middleware('auth')->name('reporte-link');
Route::get('/reporte/peliculas', [App\Http\Controllers\ReporteController::class, 'peliculasAlquiladas'])->middleware('auth')->name('reporte-peliculas');
Route::post('/reporte/peliculas', [App\Http\Controllers\ReporteController::class, 'peliculasAlquiladasFiltro'])->middleware('auth')->name('reporte-peliculas-filtro');
Route::get('/reporte/peliculas/tipo', [App\Http\Controllers\ReporteController::class, 'peliculasTipo'])->middleware('auth')->name('reporte-peliculas-tipo');
Route::get('/reporte/recargas', [App\Http\Controllers\ReporteController::class, 'recargas'])->middleware('auth')->name('reporte-recargas');
Route::post('/reporte/recargas', [App\Http\Controllers\ReporteController::class, 'recargasFiltro'])->middleware('auth')->name('reporte-recargas-filtro');
Route::get('/reporte/mas/alquiladas', [App\Http\Controllers\ReporteController::class, 'masAlquiladas'])->middleware('auth')->name('reporte-mas-alquiladas');
Route::post('/reporte/mas/alquiladas', [App\Http\Controllers\ReporteController::class, 'masAlquiladasFiltro'])->middleware('auth')->name('reporte-mas-alquiladas-filtro');
Route::get('/reporte/menos/alquiladas', [App\Http\Controllers\ReporteController::class, 'menosAlquiladas'])->middleware('auth')->name('reporte-menos-alquiladas');
Route::post('/reporte/menos/alquiladas', [App\Http\Controllers\ReporteController::class, 'menosAlquiladasFiltro'])->middleware('auth')->name('reporte-menos-alquiladas-filtro');