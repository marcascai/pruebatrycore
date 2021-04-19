<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// obtener todas las personas
Route::get('personas','App\Http\Controllers\PersonasController@getPersonas');

// obtener persona especifica
Route::get('personas/{id}', 'App\Http\Controllers\PersonasController@getPersonasBiId');

// Add persona
Route::post('addpersona', 'App\Http\Controllers\PersonasController@addPersona');

// Update persona
Route::put('updatepersona/{id}', 'App\Http\Controllers\PersonasController@updatePersona');

//Borrar persona
Route::delete('deletepersona/{id}','App\Http\Controllers\PersonasController@deletePersona');

// obtener top 3
Route::get('personastop','App\Http\Controllers\PersonasController@topPersonas');

// ---- planetas api

// obtener todos los planetas
Route::get('planetas','App\Http\Controllers\PlanetasController@getPlanetas');

// obtener planeta especifico
Route::get('planetas/{id}', 'App\Http\Controllers\PlanetasController@getPlanetasBiId');

// Add planeta
Route::post('addplaneta', 'App\Http\Controllers\PlanetasController@addPlaneta');

// Update planeta
Route::put('updateplaneta/{id}', 'App\Http\Controllers\PlanetasController@updatePlaneta');

//Borrar planeat
Route::delete('deleteplaneta/{id}','App\Http\Controllers\PlanetasController@deletePlaneta');

// obtener top 3
Route::get('planetastop','App\Http\Controllers\PlanetasController@topPlanetas');