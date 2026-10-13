<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnersController;
use Illuminate\Support\Facades\Route;
use App\Livewire\ShowProjects;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects', function () { return view('projects');})->name('projects');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/news', function () { return view('news');})->name('news');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('articles.show');
Route::get('/partners', [PartnersController::class, 'index'])->name('partners.index');