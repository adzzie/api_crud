<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CompanyController;
use App\Models\Companies;
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

// Route::get('company', [CompanyController::class, 'index'])->name('company.index');
// Route::post('company', [CompanyController::class, 'store'])->name('company.store');
// Route::get('company/{company}', [CompanyController::class, 'show'])->name('company.show');
// Route::put('company/{company}', [CompanyController::class, 'update'])->name('company.update');
// Route::delete('company/{company}', [CompanyController::class, 'destroy'])->name('company.destroy');

// Route::model('company', Companies::class);
Route::apiResource('company', CompanyController::class);
