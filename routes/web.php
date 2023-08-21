<?php

use App\Http\Controllers\InvestigatorController;
use App\Models\Book;
use App\Models\Category;
use App\Models\InvCategory;
use App\Models\Investigator;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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

Route::get('/', [InvestigatorController::class, 'home'])->name('home');

Route::get('/search', [InvestigatorController::class, 'index']);

Route::get('investigadores/{investigator:slug}', [InvestigatorController::class, 'show']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
