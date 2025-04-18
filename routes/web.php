<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', "showRegisterForm")->name("register.form");
    Route::post("/register", "register")->name("register.submit");
    Route::get('/login', "showLoginForm")->name("login.form");
    Route::post("/login", "login")->name("login");
    Route::get("/access-denied", "unauthorised")->name("access-denied");
});

Route::get("/", function () {
    return view("welcome");
})->middleware(AdminAuth::class);
