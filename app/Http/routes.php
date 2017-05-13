<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('cliente/index', 'ClienteController@index')->name('cliente.index');
Route::get('cliente/listado', 'ClienteController@listado')->name('cliente.listado');

Route::get('categoria/index', 'CategoriaController@index')->name('categoria.index');
Route::get('categoria/listado', 'CategoriaController@listado')->name('categoria.listado');

Route::get('prducto/index', 'ProductoController@index')->name('producto.index');
Route::get('prducto/listado', 'ProductoController@listado')->name('producto.listado');


Route::group(['prefix' => 'test/'], function () {
    Route::get('usuarios', function(){
        $users = \App\User::all();
        return $users;
    });

    Route::get('clientes', function(){
        $users = \App\Models\Cliente::all();
        foreach ($users as $user) {
            $ordenes = $user->ordenes;
            foreach ($ordenes as $orden) {
                $det_productos = $orden->det_productos;
                $det_servicios = $orden->det_servicios;

                foreach ($det_productos as $producto) {                    
                    $productos = $producto->productos;
                    foreach ($productos as $producto) {
                        $producto->categoria;
                    }
                }
                foreach ($det_servicios as $servicio) {                    
                    $servicios = $servicio->servicios;
                    foreach ($servicios as $servicio) {
                        $servicio->tipo;
                    }
                }


            }
        }
        

        return $users;
    });


    Route::get('productos', function(){
        $users = \App\Models\Producto::all();
        return $users;
    });

    Route::get('servicios', function(){
        $users = \App\Models\Servicio::all();
        return $users;
    });

    Route::get('ordenes', function(){
        $users = \App\Models\OrdenTrabajo::all();
        return $users;
    });

    Route::get('detalles', 'DashboardController@index');
});