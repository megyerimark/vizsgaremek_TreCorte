<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController as Category;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
 

});
//Authentikáció után sikeres berer token

Route::group(['middleware'=>["auth:sanctum"]],function(){

    Route::get("/categories",[Category::class, "index"]);
    Route::post("/st",[Category::class ,"create"])->name("create");

    Route::put("/categories/{id}",[Category::class,"update"])->name("update");
    Route::delete("/destroy/{id}", [Category::class, "destroy"])->name("destroy");
   
   


});

//Regisztárció, belépés 


Route::post("/register", [AdminController::class,"aregister"]);
Route::post("/login", [AdminController::class,"alogin"]);