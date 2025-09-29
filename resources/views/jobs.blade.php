<x-layout heading="Find Your Next Job">
    <div class="max-w-4xl mx-auto py-8 px-4">
        @foreach($jobs as $job)
            <a href="/jobs/{{ $job->id }}" class="block bg-white hover:shadow-lg transition border border-gray-200 rounded-lg p-6 mb-6">
                <div class="flex justify-between items-center mb-2">
                    <div>  
                        <h3 class ="text-md font-bold text-gray-700 mb-1">
                           {{ $job->employer->name}}

                        </h3>
                </div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $job->title }}</h2>
                    <span class="text-sm text-green-600 font-bold">
                        @if(is_numeric($job->salary))
                            ${{ number_format((float) $job->salary) }}/yr
                        @else
                            {{ $job->salary }}
                        @endif
                    </span>
                </div>
                <div class="text-sm text-gray-500 mb-2">
                    Posted by <span class="text-blue-600 font-semibold">{{ $job->employer->name }}</span>
                </div>
                <div class="flex flex-wrap gap-2 mt-4">
                    @foreach($job->tags as $tag)
                        <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </a>
        @endforeach
    </div>
    <divclass="mt-6">
    {{ $jobs->links() }}
    </div>
</x-layout>
