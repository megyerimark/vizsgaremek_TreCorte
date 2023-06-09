<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


});
//Authentikáció után sikeres műveletek

Route::group(['middleware'=>["auth:sanctum"]],function(){


    Route::post("/st",[CategoryController::class ,"create"]);

    Route::put("/categories/{id}",[CategoryController::class,"update"]);
    Route::delete("/destroyCategory/{id}", [CategoryController::class, "destroy"]);


    //Menük

    Route::post("/menuscreate",[MenuController::class, "create"]);
    Route::delete("/destroyMenus/{id}", [MenuController::class, "destroy"]);
    Route::put("/menus/{id}",[MenuController::class,"update"])->name("update");


    //Foglalások
    Route::get("/reservations", [Reservationcontroller::class,"index"])->name("index");
   Route::put("/reservation/{id}",[ReservationController::class,"update"])->name("update");
   Route::delete("/destroyReservation/{id}", [ReservationController::class, "destroy"])->name("destroy");


//    //Asztalok
//    Route::post("/table-create", [TableController::class,"create"])->name("create");
//    Route::put("/table/{id}",[TableController::class,"update"])->name("update");
//    Route::delete("/destroytable/{id}", [TableController::class, "destroy"])->name("destroy");


   //admins

//    Route::get("/users", [UserController::class, "index"]);
    });





//Regisztárció, belépés  , nem védett útvonal

Route::post("/register", [AdminController::class,"aregister"]);
// Route::post("/userreg", [UsersController::class,"userreg"]);
Route::post("/login", [AdminController::class,"alogin"]);
Route::post("/logout", [AdminController::class,"logout"]);


//Nem védett útvonalak user számára
Route::get("/categories",[CategoryController::class, "index"])->name("index");
Route::get("/menus",[MenuController::class, "index"])->name("index");
Route::post("/reservations-create", [Reservationcontroller::class,"create"])->name("create");

//Route::get("/tables", [TableController::class, "index"])->name("index");




// Route::post("/userlogout", [UserController::class,"logout"]);
