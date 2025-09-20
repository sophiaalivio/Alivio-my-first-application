<x-layout heading="{{ $job->title }}">
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md p-8 mt-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $job->title }}</h1>
        
        <div class="text-lg text-gray-600 mb-2">
            <span class="font-medium">Salary:</span> 
            @if(is_numeric($job->salary))
                ${{ number_format((float) $job->salary) }}/year
            @else
                {{ $job->salary }}
            @endif
        </div>

        <div class="text-md text-gray-500 mb-4">
            <span class="font-medium">Employer:</span> {{ $job->employer->name }}
        </div>

        @if($job->tags->count())
            <div class="mb-6">
                <h3 class="text-sm text-gray-700 mb-2 font-semibold">Tags</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($job->tags as $tag)
                        <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        <a href="/jobs" class="inline-block mt-6 bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
            ← Back to Jobs
        </a>
    </div>
</x-layout>
