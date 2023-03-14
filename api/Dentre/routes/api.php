<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController as Category;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
 

});
//Authentikáció után sikeres berer token

Route::group(['middleware'=>["auth:sanctum"]],function(){

    Route::get("/categories",[Category::class, "index"]);
    Route::post("/st",[Category::class ,"create"])->name("create");

    Route::put("/categories/{id}",[Category::class,"update"])->name("update");
    Route::delete("/destroy/{id}", [Category::class, "destroy"])->name("destroy");


    //Menük
    Route::get("/menus",[MenuController::class, "index"]);
    Route::post("/menus-create",[MenuController::class, "create"]);
    Route::delete("/destroy/{id}", [MenuController::class, "destroy"])->name("destroy");
    Route::put("/menus/{id}",[MenuController::class,"update"])->name("update");


    //Foglalások
   Route::get("/reservations", [Reservationcontroller::class,"index"])->name("index");
   Route::post("/reservations-create", [Reservationcontroller::class,"create"])->name("create");
        
    });
   
   



//Regisztárció, belépés 


Route::post("/register", [AdminController::class,"aregister"]);
Route::post("/login", [AdminController::class,"alogin"]);