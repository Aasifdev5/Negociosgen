<?php


use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TestimonialController;
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
// API Routes for Portfolio and Testimonials
Route::get('/portfolio', [PortfolioController::class, 'getAllPortfolios']);
Route::get('/testimonials', [TestimonialController::class, 'getAllTestimonials']);


// routes/web.php



