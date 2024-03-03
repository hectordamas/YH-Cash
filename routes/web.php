<?php

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){

    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('entries', App\Http\Controllers\EntriesController::class);
    Route::resource('expenses', App\Http\Controllers\ExpensesController::class);
    Route::resource('providers', App\Http\Controllers\ProvidersController::class);
    Route::resource('cashes', App\Http\Controllers\CashController::class);
    Route::resource('history', App\Http\Controllers\HistoryController::class);
    Route::resource('contables', App\Http\Controllers\ContableController::class);

    Route::get('/consultar-pagos', function(){
        return view('expenses.filter', [
            'companies' => App\Models\Company::all(),
            'cashes' => App\Models\Cash::all(),
            'banks' => App\Models\Bank::all(),
            'providers' => App\Models\Provider::all(),
            'contables' => App\Models\Contable::where('type', 'Egreso')->get(),
        ]);
    });

    Route::get('/consultar-cajas', function(){
        return view('entries.filter', [
            'cashes' => App\Models\Cash::all(),
        ]);
    });

    Route::get('/history-filter', function(){
        return view('history.filter', [
            'companies' => App\Models\Historyitem::all()->unique('empresa'),
            'cashes' => App\Models\Historyitem::all()->unique('caja'),
            'banks' => App\Models\Historyitem::all()->unique('banco'),
            'providers' => App\Models\Historyitem::all()->unique('proveedor'),
            'contables' => App\Models\Historyitem::all()->unique('cuenta'),        
        ]);
    });

    Route::post('/ex/actions', [App\Http\Controllers\ActionsController::class, 'reverse']);
    Route::get('/revertidos', [App\Http\Controllers\ActionsController::class, 'revertidos']);

    Route::post('/changePassword/{id}', [App\Http\Controllers\ActionsController::class, 'changePassword']);

});
