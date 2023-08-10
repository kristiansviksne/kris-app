<?php

use App\Events\NoteCreated;
use Illuminate\Support\Facades\Route;
use App\Interfaces\PaymentServiceInterface;
use App\Models\User;
use App\Events\TestEvent;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MetricsController;
use App\Prometheus\Prom;


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



Route::domain('admin.localhost')->group(function () {
    Route::get('/', function () {
        echo "Admin panel";
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::permanentRedirect('/from', '/to');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bind', function(PaymentServiceInterface $payment) {
    $payment->processPayment();
});
Route::get('/users', [App\Http\Controllers\UserController::class, 'dumpAll']);
Route::get('/user/{id}', function (string $id) {
    dd(User::findOrFail($id));
})->where('id', '[0-9]+');

Route::controller(App\Http\Controllers\TestController::class)->group(function () {
    Route::get('/first', 'first');
    Route::get('/second', 'second');
    Route::get('/api', 'httpClient');
});

Route::post('/event', function () {
    event(new TestEvent(Auth::user()));
})->middleware('auth');;

Route::get('/listen', function () {
    return view('listen');
})->middleware('auth');

Route::prefix('note')->group(function () {
    Route::get('/create', function () {
        return view('notes/create');
    });
    Route::post('/store', [NoteController::class, 'store']);
    Route::get('/createnote', [NoteController::class, 'createnote']);
});

Route::get('/metrics', MetricsController::class);