<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use App\Models\Tag;

// Home
Route::get('/', function () {
    return view('home');
});

// INDEX - all jobs
Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with('employer', 'tags')->paginate(10)
    ]);
});

// CREATE - form (⚡ must come before SHOW)
Route::get('/jobs/create', function () {
    $employers = Employer::all();
    $tags = Tag::all();

    return view('jobs.create', compact('employers', 'tags'));
});

// STORE - save new job
Route::post('/jobs', function (Request $request) {
    $validated = $request->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
        'employer_id' => ['required', 'exists:employers,id'],
        'tags' => ['array']
    ]);

    $job = Job::create([
        'title' => $validated['title'],
        'salary' => $validated['salary'],
        'employer_id' => $validated['employer_id']
    ]);

    $job->tags()->attach($validated['tags'] ?? []);

    return redirect('/jobs')->with('success', 'Job created successfully!');
});

// SHOW - single job
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job]);
});

// EDIT - form
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', [
        'job' => $job,
        'employers' => Employer::all(),
        'tags' => Tag::all()
    ]);
});

// UPDATE - save edits
Route::patch('/jobs/{job}', function (Job $job, Request $request) {
    $validated = $request->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
        'employer_id' => ['required', 'exists:employers,id'],
        'tags' => ['array']
    ]);

    $job->update([
        'title' => $validated['title'],
        'salary' => $validated['salary'],
        'employer_id' => $validated['employer_id']
    ]);

    $job->tags()->sync($validated['tags'] ?? []);

    return redirect('/jobs/' . $job->id)->with('success', 'Job updated successfully!');
});

// DELETE - remove job
Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();
    return redirect('/jobs')->with('success', 'Job deleted successfully!');
});
