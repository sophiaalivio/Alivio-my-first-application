<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employer;
use App\Models\Tag;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer', 'tags')->paginate(10);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create()
    {
        $employers = Employer::all();
        $tags = Tag::all();
        return view('jobs.create', compact('employers', 'tags'));
    }

    public function store(Request $request)
    {
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

        return redirect()->route('jobs.index')->with('success', 'Job created successfully!');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'job' => $job,
            'employers' => Employer::all(),
            'tags' => Tag::all()
        ]);
    }

    public function update(Request $request, Job $job)
    {
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

        return redirect()->route('jobs.show', $job)->with('success', 'Job updated successfully!');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }
}
