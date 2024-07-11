<?php

use App\Http\Controllers\ProfileController;
use App\Models\FormIssueResponse;
use App\Models\FormResponse;
use App\Models\Issue;
use Illuminate\Http\Request;
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
    $issues = Issue::all();
    $data['issues'] = $issues;
    return view('home', $data);
});

Route::post('/issues', function (Request $request) {
    $formResonse = FormResponse::create([
        'other_issues' => $request->other_issues,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'home_address' => $request->home_address,
        'message' => $request->message,
    ]);

    $selectedIssues = [];
    foreach ($request->selected_issues ?: [] as $selected_issue) {
        $selectedIssues[] = [
            'form_response_id' => $formResonse->id,
            'issue_id' => $selected_issue,
        ];
    }

    if (count($selectedIssues)) {
        FormIssueResponse::insert($selectedIssues);
    }

    return redirect()->back()->with('success', 'Your response has been submitted. Thank you!');
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
