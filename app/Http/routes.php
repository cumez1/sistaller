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
Route::get('cliente/crear', 'ClienteController@create')->name('cliente.crear');

Route::get('categoria/index', 'CategoriaController@index')->name('categoria.index');
Route::get('categoria/listado', 'CategoriaController@listado')->name('categoria.listado');

Route::get('producto/index', 'ProductoController@index')->name('producto.index');
Route::get('producto/listado', 'ProductoController@listado')->name('producto.listado');

Route::get('tiposervicio/index', 'TipoServicioController@index')->name('tiposervicio.index');
Route::get('tiposervicio/listado', 'TipoServicioController@listado')->name('tiposervicio.listado');

Route::get('servicio/index', 'ServicioController@index')->name('servicio.index');
Route::get('servicio/listado', 'ServicioController@listado')->name('servicio.listado');

Route::get('usuario/index', 'UserController@index')->name('usuario.index');
Route::get('usuario/listado', 'UserController@listado')->name('usuario.listado');
Route::get('usuario/crear', 'UserController@create')->name('usuario.crear');
Route::post('usuario/guardar', 'UserController@store')->name('usuario.guardar');




Route::group(['prefix' => 'ordenes'], function(){


    Route::get('/','OrdenTrabajoController@index')->name('orden.index');
    Route::get('/create','OrdenTrabajoController@create')->name('orden.create');
    Route::post('/recuperar','OrdenTrabajoController@recuperarRegistros');
    Route::post('/recuperarCliente','OrdenTrabajoController@recuperarCliente');
    Route::get('/guardar', 'OrdenTrabajoController@guardar')->name('orden.guardar');
    Route::get('/vaciar', 'OrdenTrabajoController@vaciar')->name('orden.vaciar'); 
    Route::get('/show/{id}', 'OrdenTrabajoController@show')->name('orden.show');
    Route::post('/agregar/{producto}', 'OrdenTrabajoController@agregar')->name('orden.agregar');       
    Route::post('/quitar/{producto}', 'OrdenTrabajoController@quitar');   
    Route::post('/listadoAjax', 'OrdenTrabajoController@listadoAjax'); 
    Route::get('/listadoAjax', 'OrdenTrabajoController@listadoAjax');    
    
});




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