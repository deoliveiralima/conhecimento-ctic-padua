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
    return redirect('publico/index');
});

//Route::get('/', 'TutorialController@index')->name('totorial.home');



Route::middleware(['auth:editor'])->group(function () {
    Route::prefix('edicao')->group(function () {

            Route::get('/', 'EdicaoController@index')->name('edicao.index');

            Route::prefix('tutoriais')->group(function () {
            Route::get('/', 'TutorialController@index')->name('tutoriais.index');
            Route::get('/create','TutorialController@create')->name('tutoriais.create');
            Route::post('/','TutorialController@store')->name('tutoriais.store');
            //Route::get('/{tutorial}','TutorialController@show')->name('tutoriais.show');
            Route::get('/{tutorial}/edit','TutorialController@edit')->name('tutoriais.edit');
            Route::put('/{tutorial}','TutorialController@update')->name('tutoriais.update');
            Route::delete('/{tutorial}','TutorialController@destroy')->name('tutoriais.destroy');


        });

        // CATEGORIAS

        Route::prefix('categorias')->group(function(){
            Route::get('/', 'CategoriaController@index')->name('categorias.index');
            Route::get('/create','CategoriaController@create')->name('categorias.create');
            Route::post('/','CategoriaController@store')->name('categorias.store');
            Route::get('/{categoria}','CategoriaController@show')->name('categorias.show');
            Route::get('/{categoria}/edit','CategoriaController@edit')->name('categorias.edit');
            Route::put('/{categoria}','CategoriaController@update')->name('categorias.update');
            Route::delete('/{categoria}','CategoriaController@destroy')->name('categorias.destroy');

        });

    });

});


// rotas administração de usuários
Route::middleware(['auth:admin'])->group(function () {

    Route::prefix('administracao')->group(function(){
        route::get('/', 'AdministracaoController@index')->name('administracao.index');

        Route::prefix('editores')->group(function(){
            route::get('/create', 'AdministracaoController@createEditor')->name('editores.create');
            route::get('/{editor}/edit', 'AdministracaoController@editEditor')->name('editores.edit');
            Route::post('/', 'AdministracaoController@storeEditor')->name('editores.store');
            Route::put('/{editor}', 'AdministracaoController@updateEditor')->name('editores.update');
            Route::delete('/{editor}', 'AdministracaoController@destroyEditor')->name('editores.destroy');


        });

        Route::prefix('admins')->group(function(){
            route::get('/create', 'AdministracaoController@createAdmin')->name('admins.create');
            route::get('/{admin}/edit', 'AdministracaoController@editAdmin')->name('admins.edit');
            Route::post('/', 'AdministracaoController@storeAdmin')->name('admins.store');
            Route::put('/{admin}', 'AdministracaoController@updateAdmin')->name('admins.update');
            Route::delete('/{admin}', 'AdministracaoController@destroyAdmin')->name('admins.destroy');


        });
    });
});

    //login e
    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
    Route::get('/login/editor', 'Auth\LoginController@showEditorLoginForm')->name('editor.login');
    
    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
    Route::post('/login/editor', 'Auth\LoginController@EditorLogin');
    
    Route::view('/home', 'home')->middleware('auth');

   Route::get('/logout/editor', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout.editor');
   Route::get('/logout/admin', '\App\Http\Controllers\Auth\LoginController@adminLogut')->name('logout.admin');


   // PUBLICO

Route::prefix('publico')->group(function(){
    Route::get('/index', 'PublicoController@index')->name('publico.index');
    Route::post('/pesquisa', 'PublicoController@pesquisa')->name('publico.pesquisa');
    Route::get('/{tutorial_url}', 'PublicoController@show')->name('publico.show');
});