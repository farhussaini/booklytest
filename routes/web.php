<?php

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

// Serve Vue.js application for all routes
Route::get('/{any}', function () {
    try {
        return view('app');
    } catch (\Exception $e) {
        // Fallback if view fails
        return response()->json([
            'error' => 'Application loading error',
            'message' => 'Please check Laravel configuration'
        ], 500);
    }
})->where('any', '.*')->name('spa');
