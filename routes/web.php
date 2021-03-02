<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/','WebController@index')->name('index');

//Route::get('login','Auth\LoginController@showLoginForm')->name('login');
//Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');

//Route::post('login','Auth\LoginController@login');
//Route::post('logout','Auth\LoginController@logout')->name('logout');
//Route::post('register','Auth\RegisterController@register');
Route::post('/contactando','ContactaController@senMail')->name('web.sendmail');
Route::post('/province-all','DocumentoController@province')->name('province');
Route::post('/district-all','DocumentoController@districts')->name('distrito');
Route::post('/pdf-afiliacion','DocumentoController@registro')->name('afiliar.vista');
//Route::get('/pdf-afiliacion','DocumentoController@registro')->name('afiliar.vista');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/formulario-afiliacion','DocumentoController@formulario')->name('afiliar');

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
Route::get('/comite','WebController@comite')->name('web.comite');
Route::get('/candidato','WebController@candidato')->name('web.candidato');
Route::get('/contactanos','ContactaController@contacta')->name('web.contacta');
//Route::get('/Elecciones','WebController@eleccion')->name('web.eleccion');
//Route::get('/no-encontrado','WebController@NotFound')->name('web.errors');
//Route::get('/provinces','GrupoPoliticoController@getProvince')->name('provincias');
//Route::get('/districts','GrupoPoliticoController@getDistrict')->name('distritos');
Route::get('/publicacion/{slug}','WebController@slug')->name('web.categoria');
route::get('/afiliados',function(){
    return view('web.afiliados.index');
})->name('web.afiliados');
