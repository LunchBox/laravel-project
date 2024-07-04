<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTodoController;

use App\Http\Controllers\Auth\AdminSessionController;

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
    return view('welcome');
});

# Route::resource('todos', TodoController::class)->middleware('auth');
Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/todos/mine', [TodoController::class, 'mine']);
  Route::resource('todos', TodoController::class)->except(['index']);

  Route::resource('projects', ProjectController::class);

  Route::resource('projects.todos', TodoController::class)->shallow();
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
  Route::get('/login', [AdminSessionController::class, 'create'])->name('admin_login');
  Route::post('/login', [AdminSessionController::class, 'store']);

  Route::middleware('admin')->group(function () {
    Route::post('/logout', [AdminSessionController::class, 'destroy'])->name('admin_logout');
  });
});

require __DIR__.'/auth.php';
