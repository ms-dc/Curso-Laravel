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

Route::any('products/search', 'ProductController@search')->name('products.search')->middleware('auth');

Route::resource('products', 'ProductController')->middleware(['auth', 'check.is.admin']);


// ROTAS ANY - ACEITA TODOS OS TIPOS DE REQUISIÇÃO HTTP

// Route::any('/any', function () {
//     return 'Any';
// });

// ROTAS MATCH - ESPECIFICA OS TIPOS DE REQUISIÇÃO HTTP

// Route::match(['get', 'post'], '/match', function () {
//     return 'Match';
// });

// ROTAS COM PARÂMETROS

// Route::get('/categories/{flag}', function ($flag) {
//     return "Produtos da categoria: {$flag}";
// });

// Route::get('/categories/{flag}/posts', function ($flag) {
//     return "Produtos da categoria: {$flag}";
// });

// Route::get('/products/{idProduct?}', function ($idProduct = '') {
//     return "Produto(s): {$idProduct}"; 
// });

// ROTAS REDIRECT - REDIRECIONA UMA ROTA À OUTRA

// Route::redirect('/redirect1', '/redirect2');

// // Route::get('redirect1', function() {
// //     return redirect('/redirect2');
// // });

// Route::get('redirect2', function() {
//     return 'redirect 2';
// });

// ROTAS VIEW - RETORNA UMA VIEW (RECOMENDADO APENAS PARA VIEWS SIMPLES QUE NÃO NECESSITAM DE CONTROLLER)

// Route::view('view', 'welcome');

// ROTAS NOMEADAS - ROTAS COM NOME QUE PODEM SER REFERENCIADAS SEM NECESSIDADE DE SE ALTERAR TODO O CÓDIGO

// Route::get('/name-url', function () {
//     return 'hey';
// })->name('url.name');

// ROTAS AGRUPADAS - ROTAS AGRUPADAS PODEM SER REFERENCIADAS SEM NECESSIDADE DE SE ALTERAR TODO O CÓDIGO

// Route::middleware(['auth'])->group(function () {

//     Route::prefix('admin')->group(function () {

//         Route::namespace('Admin.')->group(function() {

//             Route::name('admin.')->group(function() {

//                 Route::get('/dashboard', 'TestController@test')->name('dashboard');
            
//                 Route::get('/finances', 'TestController@test')->name('finances');

//                 Route::get('/products', 'TestController@test')->name('products');

//                 Route::get('/', function() {
//                     return redirect()->route('admin.dashboard');
//                 })->name('home');
//             });  
//         });
//     });
// });

// Route::get('/login', function () {
//     return 'login';
// })->name('login');

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
