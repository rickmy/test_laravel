<?php

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

Route::get('/', 'PagesController@index');
/*
aqui dos formas de retornar una vista
Route::view('photos','photos',['num'=>125]);

*/
Route::get('blog', 'PagesController@blog' )->name('blog');
Route::get('about-us/{name?}', 'PagesController@aboutUs')->name('aboutUs');
Route::get('notes', 'NotesController@notes')->name('notes');
Route::get('notes/{note}', 'NotesController@notesDetail')->name('notes.detail');
Route::get('notes/edit/{note}', 'NotesController@notesEdit')->name('notes.edit');

Route::post('notes/save', 'NotesController@save')->name('notes.save');
Route::put('notes/update/{id}', 'NotesController@update')->name('notes.update');
Route::delete('notes/delete/{id}', 'NotesController@delete')->name('notes.delete');


Route::get('hola/{numero?}',function ($numero = 'sin nùmero'){
  return 'es una pagina con un parametro, como unicamente numero : ' .$numero;
})->where(['numero'=>'[0-9]+']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/courses', 'CourseController');
Route::resource('/photos', 'PhotoController');
Route::resource('/books', 'BookController');

