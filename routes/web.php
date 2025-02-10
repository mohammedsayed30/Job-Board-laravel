<?php

use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*************************************************************************
 *                             the Listings model(table)
 **************************************************************************/

// map the home request to the index page
Route::get('/', [ListingsController::class, 'index']);
Route::get('home', [ListingsController::class, 'index']);
// map the search request to search method to filter all results based on the srearch
Route::get('/?search', [ListingsController::class, 'search']);
// display a certain listing from the available listings(both user&guest)
Route::get('/listings/{listing}', [ListingsController::class, 'show']);

// apply the middleware  to make the ones who logged in to access this pages
Route::middleware('auth')->group(function () {
    // map the create request to the create method that contain form to post a job
    Route::get('/create', [ListingsController::class, 'create']);
    // map the request creategig to the validate create
    Route::post('/store', [ListingsController::class, 'store']);
    // map the request edit job to the validate create
    Route::get('/listings/{listing}/edit', [ListingsController::class, 'edit']);
    // map the request edit job to the validate create
    Route::delete('/listings/{listing}/delete', [ListingsController::class, 'delete']);
    // map the request creategig to the validate create
    Route::put('/listings/{listing}', [ListingsController::class, 'update']);
    // map the request creategig to the validate create
    Route::get('manage', [ListingsController::class, 'manage']);
    // logout the user
    Route::post('logout', [UserController::class, 'logout']);
});

/*************************************************************************
 *                             the Users model(table)
 **************************************************************************/
// only  the guest can access these pages
Route::middleware('guest')->group(function () {
    // show the register form
    Route::get('register', [UserController::class, 'register'])->name('register');
    // show the login form
    Route::get('login', [UserController::class, 'login'])->name('login');
});

// validate and store the register form into the database
Route::post('user/store', [UserController::class, 'store']);
// show the login form
Route::post('user/login', [UserController::class, 'loginValidate']);
