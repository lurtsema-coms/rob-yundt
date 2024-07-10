<?php

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

Route::get('/', function () {
    $data['options'] = [
        'Protecting Women’s Safe Spaces & Sports Integrity (NO MEN IN WOMENS SPORTS OR BATHROOMS!!)',
        'Protecting the Statutory PFD (Balance the budget by increasing revenue & decreasing expenses)',
        'Election Integrity (implement all the great changes we’ve made in the MSB elections at the State level)',
        'Tougher on Crime (specifically sex offenders & drug traffickers)',
        'Defending the Second Amendment',
        'Protecting the Unborn',
        'Backing the Blue & Law Enforcement',
        'Returning State Lands to the MSB Borough & other Boroughs for so they can be auctioned to Residents to help keep housing affordable',
        'Protecting Parents\' Rights in School Choice & Education',
        'Stricter Wildlife Regulations for Non-Alaskans (we must prioritize Residents!!)',
        'Responsible Resource Development & Revenue Generation so we can increase the PFD',
        'Revival of the Timber Industry (increase revenue for larger PFD & prevent costly wildfires)',
    ];
    return view('home', $data);
});

Route::post('/issues', function () {
    dd(request()->all());
})->name('issues.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
