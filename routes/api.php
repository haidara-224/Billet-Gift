<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\SalleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('gift')->name('gift.')->group(function(){
    Route::resource('/categorie',CategorieController::class);
    Route::resource('/salle',SalleController::class);
    Route::resource('/organisateur',OrganisateurController::class)->except(['create','show']);
    Route::resource('/evenement',EvenementController::class);

});
