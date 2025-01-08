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
</x-app-layout>
