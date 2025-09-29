<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>

    <div class="mb-4 flex justify-end">
        <a href="/jobs/create"
           class="bg-indigo-600 text-white px-4 py-2 rounded-md">+ New Job</a>
    </div>

    <div class="overflow-hidden bg-white shadow rounded-lg divide-y">
        @foreach($jobs as $job)
            <div class="p-6 flex items-center justify-between">
                <div>
                    <a href="/jobs/{{ $job->id }}"
                       class="text-lg font-semibold text-indigo-600 hover:underline">
                        {{ $job->title }}
                    </a>
                    <p class="text-gray-600 text-sm">{{ $job->salary }}</p>
                    <p class="text-sm text-gray-500">
                        Employer: {{ $job->employer->name ?? 'N/A' }}
                    </p>
                    @if($job->tags->count())
                        <div class="mt-2 flex flex-wrap gap-2">
                            @foreach($job->tags as $tag)
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="flex space-x-3">
                    <a href="/jobs/{{ $job->id }}/edit"
                       class="text-blue-600 hover:underline">Edit</a>
                    <form method="POST" action="/jobs/{{ $job->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline"
                                onclick="return confirm('Delete this job?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</x-layout>
