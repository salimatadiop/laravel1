<?php

use App\Http\Controllers\etudiantcontroller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/etudiant", [etudiantcontroller::class, "index"])->name("etudiant");
Route::get("/etudiant/create", [etudiantcontroller::class, "create"])->name("etudiant.create");

Route::get("/etudiant/{etudiant}", [etudiantcontroller::class, "edit"])->name("etudiant.edit");

Route::post("/etudiant/create", [etudiantcontroller::class, "store"])->name("etudiant.ajouter");
Route::delete("/etudiant/{etudiant}", [etudiantcontroller::class, "delete"])->name("etudiant.supprimer");
Route::put("/etudiant/{etudiant}", [etudiantcontroller::class, "update"])->name("etudiant.update");
