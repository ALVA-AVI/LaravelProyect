<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/','WebController@index')->name('index');

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
//Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');

Route::post('login','Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout')->name('logout');
//Route::post('register','Auth\RegisterController@register');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/admin/category/{module}','CategoryController@modulo')->name('module');

Route::resource('/admin/categories', 'CategoryController')->names('categories');
Route::resource('/admin/publicaciones','RegistroController')->names('registros');
Route::resource('/admin/banner','CarruselController')->names('banners');
ROute::resource('/admin/comites','GrupoPoliticoController')->names('comites');
ROute::resource('/admin/candidatos','CandidatoController')->names('candidatos');
ROute::resource('/admin/tema-consultas','TemaController')->names('temas');





/************************** */

Route::get('/noticias','WebController@home')->name('web.index');
Route::get('/noticia/{noticia}','WebController@show')->name('web.show');
Route::get('/documento/{file}','WebController@files')->name('web.files');
Route::get('/documentos/{modulo}','WebController@modulo')->name('web.modulo');
Route::get('/Elecciones','WebController@eleccion')->name('web.eleccion');
Route::get('/no-encontrado','WebController@NotFound')->name('web.errors');
Route::get('/provinces','GrupoPoliticoController@getProvince')->name('provincias');
Route::get('/districts','GrupoPoliticoController@getDistrict')->name('distritos');
Route::get('/publicacion/{slug}','WebController@slug')->name('web.categoria');
route::get('/afiliados',function(){
    return view('web.afiliados.index');
})->name('web.afiliados');
