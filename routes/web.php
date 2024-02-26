<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
/*
Route::view('/{any}','dashboard')
->where('any','.*')
->name('dashboard');
*/
Route::get('/', function () {
    return view('Gift');
})->name('gift');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:admin|Super Admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','role:Super Admin'])->name('super.')->prefix('super')->group(function(){
    Route::resource('/users',UserController::class)->except(['create','store','edit','update']);
    Route::post('/user/{user}/role',[UserController::class,'role'])->name('user.role');
    route::delete('/user/{user}/role/{role}',[UserController::class,'revokeRoles'])->name('role.user.revoke');
    Route::get('/users/{user}/permission/user',[UserController::class,'showPermission'])->name('user.permission.show');
    Route::post('/user/{user}/permission',[UserController::class,'permission'])->name('user.permission');
    Route::delete('/user/{user}/permission/{permission}',[UserController::class,'revokeUserPermission'])->name('user.revoke.permission');
    Route::resource('/permission',PermissionController::class);
    Route::post('/permission/{permission}/role',[PermissionController::class,'role'])->name('permission.role');
    route::delete('/permission/{permission}/role/{role}',[PermissionController::class,'revokeRole'])->name('role.revoke');
    Route::resource('/roles',RoleController::class);
    Route::post('/roles/{role}/permission',[RoleController::class,'permission'])->name('role.permission');
    route::delete('/roles/{role}/permission/{permission}',[RoleController::class,'revokePermission'])->name('permission.revoke');

});

require __DIR__.'/auth.php';
