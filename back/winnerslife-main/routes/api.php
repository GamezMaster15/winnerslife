<?php

use App\Http\Controllers\Api\CategoryController;

use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VideoController;

use App\Http\Controllers\Api\CareerController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Rutas get
Route::get('/students', [StudentController::class, 'listStudents']);

Route::get('/students/{id}', [StudentController::class, 'showStudent']);

Route::get('/country', [CountryController::class, 'listCountry']);

Route::get('/country/{id}', [CountryController::class, 'showCountry']);

Route::get('/permissions', [PermissionController::class, 'listPermission']);

Route::get('/permissions/{id}', [PermissionController::class, 'showPermission']);

Route::get('/category', [CategoryController::class, 'listCategory']);

Route::get('/category/{id}', [CategoryController::class, 'showCategory']);

Route::get('/user', [UserController::class, 'listUsers']);

Route::get('/user/{id}', [UserController::class, 'showUsers']);

Route::get('/video', [VideoController::class, 'listVideo']);

Route::get('/video/{id}', [VideoController::class, 'showVideo']);

Route::get('/career', [CareerController::class, 'listCareer']);

Route::get('/course', [CourseController::class, 'listCourse']);



//rutas post
Route::post('/students', [StudentController::class, 'registerStudent']);

Route::post('/country', [CountryController::class, 'registerCountries']);

Route::post('/permissions', [PermissionController::class, 'registerPermission']);

Route::post('/category', [CategoryController::class, 'registerCategory']);

Route::post('/user', [UserController::class, 'registerUsers']);

Route::post('/video', [VideoController::class, 'registerVideo']);

Route::post('/career', [CareerController::class, 'registerCareer']);

Route::post('/course', [CourseController::class, 'registerCourse']);

//rutas put, patch
//actualizar datos, (todos los datos)
Route::put('/students/{id}', [StudentController::class, 'upgradeAll']);

//actualizar datos, (dato en especifico)
Route::patch('/students/{id}', [StudentController::class, 'upgradePartial']);

Route::patch('/country/{id}', [CountryController::class, 'upgradePartialCountry']);

Route::patch('/permissions/{id}', [PermissionController::class, 'upgradePartialPermission']);

Route::patch('/category/{id}', [CategoryController::class, 'upgradePartialCategory']);

Route::patch('/user/{id}', [UserController::class, 'registerUserupgradePartialUser']);

Route::patch('/video/{id}', [VideoController::class, 'upgradePartialVideo']);

Route::patch('/career/{id}', [CareerController::class, 'upgradePartialCreer']);