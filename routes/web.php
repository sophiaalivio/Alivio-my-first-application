<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use App\Models\Tag;
use App\Http\Controllers\JobController;


// Home
Route::get('/', function () {
    return view('home');
});

Route::resource('jobs', JobController::class);
