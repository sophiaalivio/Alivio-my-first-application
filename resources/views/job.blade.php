<x-layout>
    <div class="bg-white rounded-xl shadow-md p-6">
        <h1 class="text-2xl font-bold">{{ $job->title }}</h1>
        <p class="text-gray-600 mt-2">Salary: {{ $job->salary }}</p>
        <p class="text-gray-500 mt-2">Employer: {{ $job->employer->name }}</p>
        <a href="/jobs" class="inline-block mt-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
            Back to Jobs
        </a>
    </div>
</x-layout>
