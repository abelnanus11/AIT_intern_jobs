<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


Route::get('/',[ListingController::class, 'index']);




// creating form 
Route::get('listings/create',[ListingController::class, 'create'])->middleware("auth");

// storing form credintials
Route::post('/listings',[ListingController::class, 'store'])->middleware("auth");


Route::get("/listings/manage",[ListingController::class, "manage"])->middleware("auth");

//single listing
Route::get('/listings/{listing}',[ListingController::class, 'show']);

//edit
Route::get('/listings/{listing}/edit',[ListingController::class, "edit"])->middleware("auth");

//update the form

Route::put('/listings/{listing}',[ListingController::class, 'update'])->middleware("auth");

//delete
Route::delete('/listings/{listing}',[ListingController::class, 'delete'])->middleware("auth");


// Route::get("/listings/manage",[UserController::class, "manage"])->middleware("auth");


// showing register form
Route::get("/register",[UserController::class, "register"])->middleware("guest");


//creating new user
Route::post("/users",[UserController::class, "store"]);

//log user out  
Route::post("/logout", [UserController::class, "logout"])->middleware("auth");

// show Login Form
 Route::get("/login",[UserController::class, "login"])->name("login")->middleware("guest");

Route::post("/users/authenticate", [UserController::class, "authenticate"]);

























// Route::get('/hello', function () {
//     return response('<h1>welcome Abel Tegegn</h1>', 200);
// });
// Route::get('/posts/{id}', function ($id) {
//     return response('post ' . $id, 200);
// }) -> where("id", "[0-9]+");
// Route::get('/search', function (Request $request) {
//     return $request->name . " " . $request->city;
// }); 
