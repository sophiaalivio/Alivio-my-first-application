<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>

    <div class="max-w-lg mx-auto bg-white rounded-xl shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800">{{ $job['title'] }}</h2>
        <p class="text-gray-600 mt-2">
            This job pays 
            <span class="font-semibold text-green-600">{{ $job['salary'] }}</span> 
            per year.
        </p>

        <div class="mt-6">
            <a href="/jobs" 
               class="inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                ← Back to Jobs
            </a>
        </div>
    </div>
</x-layout>
