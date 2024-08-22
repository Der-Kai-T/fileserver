<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth')->group(function () {
   // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  //  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');


    Route::resource("/edit/file", FileController::class);

    Route::get("/file/{file}", [FileController::class, 'download'])->name('file.download');



    Route::resource("/user", \App\Http\Controllers\AdminUserController::class);
    Route::post("/user/{user}/disable", [\App\Http\Controllers\AdminUserController::class, "disable"]);
    Route::post("/user/{user}/enable", [\App\Http\Controllers\AdminUserController::class, "enable"]);
    Route::post("/user/{user}/role_assign", [\App\Http\Controllers\AdminUserController::class, "role_assign"]);
    Route::post("/user/{user}/role_remove", [\App\Http\Controllers\AdminUserController::class, "role_remove"]);
    Route::post("/user/{user}/password", [\App\Http\Controllers\AdminUserController::class, "password"]);

    Route::resource("/role", \App\Http\Controllers\AdminRoleController::class);
    Route::post("/role/{role}/permission_add", [\App\Http\Controllers\AdminRoleController::class, 'permission_add']);
    Route::post("/role/{role}/permission_remove", [\App\Http\Controllers\AdminRoleController::class, 'permission_remove']);


});

require __DIR__.'/auth.php';
