<?php
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Crud;
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
   


    Route::get('estudante', Crud::class)->name('estudante');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    


    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');

    
        
        
    });



    Route::get('/', function () {
        return view('welcome');
        })->name('welcome');


        
  