<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\TestMiddleware;


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



// Route::get('/test', function () {
//     return view('test');
// });

//test pengunaan get

$data = [];

for ($i = 1; $i <= 3; $i++) {
    $data[] = [
        'id' => $i,
        'name' => "Name $i",
        'email' => "email $i",
        'address' => "address $i",
    ];
}

Route::get('/test', function () use ($data) {
   

    echo '<pre>';
    var_dump($data);
    echo '</pre>';
});

//test penggunaan post

use Illuminate\Http\Request;

Route::post('/test', function (Request $request) use ($data) {
    
    // var_dump($data);
    // var_dump($request->all());

    $data[] = [
        'id' => count($data) + 1,
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
    ];

    return $data;
});

//test put
Route::put('/test', function (Request $request) use ($data) {
  
    // Update data
    $data[0] = [
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
    ];

    return $data;
});


Route::put('/test/{id}', function (Request $request, $id) use ($data) {
  
    // Update data
    $data[$id - 1] = [
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
    ];

    return $data;
});


//router - menggunakan method patch untuk ubah data
Route::patch('/test/{id}', function (Request $request, $id) use ($data) {
  
    // Update data
    $data[$id - 1] = [
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
    ];

    return $data;
});

//router - menggunakan method delete untuk hapus data
Route::delete('/test/{id}', function ($id) use ($data) {
    // Cek apakah ID valid
    if ($id < 1 || $id > count($data)) {
        return response()->json(['error' => 'Invalid ID'], 404);
    }

    // Hapus data
    unset($data[$id - 1]);

    //var_dump($data);

    return response()->json(['message' => 'Data deleted successfully']);
});


//penggunaan midelware untuk mengatur akses


Route::get('/testmiddleware', function () { 
    return "Berhasil masuk";
})->middleware('CekMembership');


Route::get('/gagal', function () {
    return view('gagal');
});