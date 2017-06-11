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
    return redirect('/home');
});


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });

    Route::post('login', function (\Illuminate\Http\Request $request) {

        if ($request->isJson()) {
            $data = $request->json()->all();
        } else {
            $data = $request->all();
        }

        if( $request->json()->get('username') == "employed"){
            $response = array('status' => true, 'message'=>'succes');
        }else{
            $response = array('status' => false, 'message'=>'failed');
        }

        return response()
            ->json($response);

    });
    Route::get('menu','MenuApiController@index');
    Route::get('menu/food','MenuApiController@food');
    Route::get('menu/drink','MenuApiController@drink');
    Route::get('menu/{id}', [
        'uses' => 'MenuApiController@find'
    ]);
    Route::post('order','OrderApiController@newOrder');

});


Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('menus', 'menuController');

Route::resource('orders', 'OrderController');