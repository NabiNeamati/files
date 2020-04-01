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

use Illuminate\Http\Request;

Route::post('process', function (Request $request) {

    // cache the file
    $file = $request->file('photo');

    // generate a new filename. getClientOriginalExtension() for the file extension
    $filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();

    // save to storage/app/photos as the new $filename
    $path = $file->storeAs('photos', $filename);

    dd($path);
});

Route::get('new', function(){

	// Source: https://scotch.io/tutorials/understanding-and-working-with-files-in-laravel

	Storage::put('live2.inc', 'this is the constant');

	echo "Finel Created!";

	Storage::prepend('live2.inc', 'Prepended Text');

	echo "Text Prepended";

	Storage::append('live2.inc', 'apended Text');

	echo "Text Apended";

	//get File Name
	print_r (Storage::get('live2.inc'));

	//get file Last Modified Date
	print_r(Storage::lastModified('live2.inc'));


	echo Storage::url('live2.inc');

});


Route::get('run', function(){
	// SSH::into('S1')->run(array(
	//     'mkdir /nabi',
	// ));

	SSH::into('S1')->run(['ssh -tt root@45.32.135.79 "mkdir Nabi"']);

	echo "Run SSH Comand";
});
