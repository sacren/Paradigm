<x-app-layout>
    <x-slot:title>
        {{ $job->title }}
    </x-slot:title>

    <x-slot:header>
        {{ $job->title }}
    </x-slot:header>

    <p>The Pay is {{ $job->salary }} per year.</p>

    <div class="flex space-x-4 mt-4">
        {{-- Edit Button --}}
        <a href="{{ route('jobs.edit', $job) }}" class="rounded-md bg-indigo-600 px-6 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            {{ __('Edit') }}
        </a>

        {{-- Delete Button --}}
        <form action="{{ route('jobs.destroy', $job) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="rounded-md bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                {{ __('Delete') }}
            </button>
        </form>
    </div>
</x-app-layout>
