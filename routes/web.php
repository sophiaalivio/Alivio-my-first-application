<?php

use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            ['id' => 1, 'title' => 'Director', 'salary' => '$50,000'],
            ['id' => 2, 'title' => 'Programmer', 'salary' => '$10,000'],
            ['id' => 3, 'title' => 'Teacher', 'salary' => '$40,000']
        ]
    ]);
});


// Single Job - using a Route Wildcard
Route::get('/jobs/{id}', function ($id) {
    // We will find the specific job here
});
