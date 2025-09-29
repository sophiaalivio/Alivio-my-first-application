<x-layout>
    <x-slot:heading>
        {{ $job->title }}
    </x-slot:heading>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-bold">{{ $job->title }}</h2>
        <p class="text-gray-700 mt-2">Salary: {{ $job->salary }}</p>
        <p class="text-gray-500 mt-1">Employer: {{ $job->employer->name ?? 'N/A' }}</p>

        @if($job->tags->count())
            <div class="mt-3 flex flex-wrap gap-2">
                @foreach($job->tags as $tag)
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
        @endif
    </div>

    <div class="mt-6 flex space-x-4">
        <a href="/jobs/{{ $job->id }}/edit"
           class="bg-blue-600 text-white px-4 py-2 rounded-md">Edit</a>

        <form method="POST" action="/jobs/{{ $job->id }}">
            @csrf
            @method('DELETE')
            <button class="bg-red-600 text-white px-4 py-2 rounded-md"
                    onclick="return confirm('Delete this job?')">
                Delete
            </button>
        </form>
    </div>

    <div class="mt-4">
        <a href="/jobs" class="text-gray-600 hover:underline">← Back to Jobs</a>
    </div>
</x-layout>
