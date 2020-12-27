<?php

use App\Http\Controllers\CompaniesController;
// use App\Models\Companies;
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

// Route::get('companies', [CompaniesController::class, 'index'])->name('companies.index');
// Route::post('companies', [CompaniesController::class, 'store'])->name('companies.store');
// Route::get('companies/{company}', [CompaniesController::class, 'show'])->name('companies.show');
// Route::put('companies/{company}', [CompaniesController::class, 'update'])->name('companies.update');
// Route::delete('companies/{company}', [CompaniesController::class, 'destroy'])->name('companies.destroy');

Route::model('company', Companies::class);
Route::apiResource('companies', CompaniesController::class);
