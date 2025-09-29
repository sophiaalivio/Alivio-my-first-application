<x-layout>
    <x-slot:heading>
        Edit Job
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-8">
            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-6 sm:gap-x-6">

                <!-- Title -->
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $job->title) }}"
                           class="mt-2 block w-full border rounded-md p-2" required>
                    @error('title')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Salary -->
                <div class="sm:col-span-6">
                    <label for="salary" class="block text-sm font-medium">Salary</label>
                    <input type="text" name="salary" id="salary" value="{{ old('salary', $job->salary) }}"
                           class="mt-2 block w-full border rounded-md p-2" required>
                    @error('salary')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Employer -->
                <div class="sm:col-span-6">
                    <label for="employer_id" class="block text-sm font-medium">Employer</label>
                    <select name="employer_id" id="employer_id"
                            class="mt-2 block w-full border rounded-md p-2" required>
                        @foreach($employers as $employer)
                            <option value="{{ $employer->id }}"
                                {{ old('employer_id', $job->employer_id) == $employer->id ? 'selected' : '' }}>
                                {{ $employer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tags -->
                <div class="sm:col-span-6">
                    <label class="block text-sm font-medium">Tags</label>
                    <div class="mt-2 flex flex-wrap gap-3">
                        @foreach($tags as $tag)
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                    {{ in_array($tag->id, old('tags', $job->tags->pluck('id')->toArray())) ? 'checked' : '' }}>
                                <span>{{ $tag->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="mt-6 flex justify-end gap-x-6">
            <a href="/jobs/{{ $job->id }}" class="px-3 py-2 text-gray-600">Cancel</a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Update</button>
        </div>
    </form>

    <!-- Delete -->
    <form method="POST" action="/jobs/{{ $job->id }}" class="mt-4">
        @csrf
        @method('DELETE')
        <button class="text-red-600">Delete</button>
    </form>
</x-layout>
