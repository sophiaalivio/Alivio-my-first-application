<x-layout>
    <h1 class="text-2xl font-bold mb-6">Available Jobs</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($jobs as $job)
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-semibold">{{ $job->title }}</h2>
                <p class="text-gray-600 mt-2">Salary: {{ $job->salary }}</p>
                <p class="text-gray-500 text-sm mt-1">Employer: {{ $job->employer->name }}</p>
                <a href="/jobs/{{ $job->id }}" class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    View Details
                </a>
            </div>
        @endforeach
    </div>
</x-layout>
