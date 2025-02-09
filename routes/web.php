<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;



Route::controller(UserController::class)->group(function () {
    Route::view("/", "login")->name("login");
    Route::post("/loginForm", "loginForm");

    // register view & post route
    Route::view("/register", "registration")->name("register");
    Route::post("/registerForm", "registerForm");

    // dashboard route
    Route::get("/dashboard", "dashboard")->name("dashboard")->middleware(AuthMiddleware::class);

    // author route
    Route::get("/author", "author")->name("author")->middleware(AuthMiddleware::class);

    // user route
    Route::get("/user", "user")->name("user")->middleware(AuthMiddleware::class);

    // logout route
    Route::get("/logout", "Logout")->name("logout");
});
