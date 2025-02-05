<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//test pengunaan get

Route::get('/test', function () {
    $data = [];

    for ($i = 1; $i <= 3; $i++) {
        $data[] = [
            'id' => $i,
            'name' => "Name $i",
            'email' => "email $i",
            'address' => "address $i",
        ];
    }

    echo '<pre>';
    var_dump($data);
    echo '</pre>';
});

//test penggunaan post

use Illuminate\Http\Request;

Route::post('/test', function (Request $request) {
    return $request->all();
});