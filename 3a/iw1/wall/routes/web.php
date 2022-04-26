<?php

use App\Http\Controllers\WallController;
use App\Models\Message;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    $messages = Message::latest()->get();

    // compact('messages') === ['messages' => $messages]
    // Inverse: extract(['messages' => $messages]) === $messages
    return view('dashboard', compact('messages'));
})->middleware(['auth'])->name('dashboard');

Route::get('/post-a-message', [WallController::class, 'post'])
    ->middleware(['auth'])
    ->name('post-message');

Route::get('/messages/{id}', function (Request $request, $id) {
    dd($request->id, $id);
});

require __DIR__.'/auth.php';
