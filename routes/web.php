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

route::group(['middleware'=>[
    'auth:sanctum',
    'verified',
    'accessrole',


]],function(){
   


    Route::get('/propostas', function () {
        return view('UserSide.propostas');
    })->name('propostas');

    Route::get('/dashboard', function () {
        return view('UserSide.dashboard');
    })->name('dashboard');

    Route::get('/mensagem', function () {
        return view('UserSide.mensagem');
    })->name('mensagem');
    


    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');

    
        
        
    });

    route::get('/teste', function () {
        return view('teste');
    });

    route::get('/', function () {
        return view('UserSide.welcome');
        })->name('welcome');
    



        
