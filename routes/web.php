<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/',[IndexController::class,'index'])->name('index');
    Route::get('materiels/options',[MaterielController::class,'options'])->name('materiels.options');
    Route::resource('materiels',MaterielController::class);
    Route::get('/generateListesMateriels', [MaterielController::class, 'generateListeMateriels'])->name('generateListeMateriels');
    Route::resource('personnes',PersonneController::class);

    Route::get('/generatePersonne/{id}', [PersonneController::class, 'generatePersonne'])->name('generatePersonne');

    Route::get('transactions',[TransactionController::class,'index'])->name('transactions');
    Route::get('incomes',[TransactionController::class,'incomes'])->name('incomes');
    Route::get('depenses',[TransactionController::class,'depenses'])->name('depenses');
    Route::get('/generateTransactions/{all}-{isincome}', [TransactionController::class, 'generateTransactions'])->name('generateTransactions');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
