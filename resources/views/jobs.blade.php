<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" 
               class="block p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-gray-800">{{ $job['title'] }}</h2>
                <p class="text-gray-600 mt-2">Salary: 
                    <span class="font-medium text-green-600">{{ $job['salary'] }}</span>
                </p>
                <p class="mt-4 text-blue-500 hover:underline">View Details →</p>
            </a>
        @endforeach
    </div>
</x-layout>
