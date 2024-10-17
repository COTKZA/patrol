<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProcessLineController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [AdminController::class,'dashboard']);
Route::get('/home', [AdminController::class,'dashboard'])->name('home');
Route::get('/machine', [MachineController::class,'index']);

Route::resource('/process_lines', ProcessLineController::class);
Route::post('/process_lines', [ProcessLineController::class, 'store'])->name('process_lines.store');


Auth::routes(); 