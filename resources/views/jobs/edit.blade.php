<x-app-layout>
    <x-slot:title>
        {{ $job->title }}
    </x-slot:title>

    <x-slot:header>
        <div class="inline-flex items-center">
            <div class="text-lg font-bold text-gray-900">
                {{ __('Edit Job') }}
            </div>
            <div class="px-2 text-lg font-bold text-red-500 bg-green-100">
                {{ $job->title }}
            </div>
        </div>
    </x-slot:header>

    {{-- The edit form --}}
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Job</h2>

                    {{-- We use PATCH method for updates and include CSRF protection --}}
                    <form action="{{ route('jobs.update', $job) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        {{-- Title Field --}}
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">
                                Job Title
                            </label>
                            <div class="mt-1">
                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $job->title) }}"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('title') border-red-500 @enderror"
                                    placeholder="e.g. Senior Developer" minlength="3" maxlength="255" required>
                            </div>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500">
                                Use letters, numbers, spaces, and hyphens only
                            </p>
                        </div>

                        {{-- Salary Field --}}
                        <div>
                            <label for="salary" class="block text-sm font-medium text-gray-700">
                                Salary
                            </label>
                            <div class="mt-1 relative">
                                <input type="text" name="salary" id="salary"
                                    value="{{ old('salary', $job->salary) }}"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 sm:text-sm border-gray-300 rounded-md @error('salary') border-red-500 @enderror"
                                    placeholder="$75,000.00" maxlength="14" required>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                            </div>
                            @error('salary')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500">
                                Format: $XX,XXX.XX (include dollar sign and commas)
                            </p>
                        </div>

                        {{-- Form Actions --}}
                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('jobs.index') }}"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-50 hover:text-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Cancel
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
