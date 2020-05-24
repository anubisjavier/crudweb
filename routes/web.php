<?php



Route::group(['middleware' => ['cors']], function () {
    Route::get('/', function () {
        return view('apptareas');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::apiResource('/tareas', 'TareaController');  //Rutas a las que se permitirá acceso
});
