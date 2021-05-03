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

use App\Http\Controllers\HelloController;

Route::get('/hello/{id?}', [HelloController::class, 'index']);
Route::get('/hello/other', [HelloController::class, 'other']);

// Route::get('hello', 'App\Http\Controllers\HelloController@index');

// Route::get('hello/{msg}', function ($msg) {

// $html = <<<EOF
// <html>
// <heasd>
// <title>Hello Wold</title>
// <style>
// body {font-size:16pt; color:#999; }
// h1  {font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px; }
// </style>
// </head>
// <body>
//     <h1>Hello</h1>
//     <p>{$msg}</p>
//     <p>これはサンプルです</p>
// </body>
// </html>
// EOF;

//     return $html;
// });
