<?php

use Illuminate\Support\Facades\Route;
//agregamos los controladores 
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;

use App\Http\Controllers\VentanaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //redirigimos a la vista de diarios de momento 
    Route::get('/ventana-20-25', function () {
        return view('ventana-20-25.index');
    })->name('ventanas.index');
    
    // Route::get('/cotizaciones', function () {
    //     return view('cotizaciones.index');
    // })->name('cotizaciones');

});

//new
Route::group(['middleware' => ['auth']], function () {


    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);

    //RUTAS DE COTIZACION DE VENTANAS LINEA 20 Y 25
    Route::resource('ventanas', VentanaController::class)->except(['show']);
    Route::get('/ventanas/precios', [VentanaController::class, 'precios'])->name('ventanas.precios');
    Route::put('/ventanas/{ventana}/precio', [VentanaController::class, 'actualizarPrecio'])->name('ventanas.actualizar.precio');
    Route::post('/ventanas/pdf', [VentanaController::class, 'generarPDF'])->name('ventanas.pdf');

});