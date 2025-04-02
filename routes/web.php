<?php

use App\Http\Controllers\FormsController;
use App\Http\Controllers\ProfileController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Liste des sondages
Route::get('/', [FormsController::class, 'index'])->name('forms.index');

// Afficher le formulaire de création
Route::get('/create', [FormsController::class, 'create'])->name('forms.create');

// Enregistrer un sondage (POST)
Route::post('/store', [FormsController::class, 'store'])->name('forms.store');

// Affichage d'un sondage spécifique
Route::get('/forms/{id}', [FormsController::class, 'show'])->name('forms.show');

// Route pour répondre à un sondage (future implémentation)
Route::get('/forms/{id}/answer', [FormsController::class, 'answer'])->name('forms.answer');

// Route pour modifier un sondage (future implémentation)
Route::get('/forms/{id}/edit', [FormsController::class, 'edit'])->name('forms.edit');

// Route pour mettre à jour un sondage (future implémentation)
Route::post('/forms/{id}/update', [FormsController::class, 'update'])->name('forms.update');

// Route pour supprimer un sondage (future implémentation)
Route::delete('/forms/{id}', [FormsController::class, 'destroy'])->name('forms.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
