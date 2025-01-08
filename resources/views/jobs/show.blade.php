<x-app-layout>
    <x-slot:title>
        {{ $job->title }}
    </x-slot:title>

    <x-slot:header>
        {{ $job->title }}
    </x-slot:header>

    <p>The Pay is {{ $job->salary }} per year.</p>

    <x-button-link :href="route('jobs.edit', $job)" class="mt-4 w-24 text-center">
        {{ __('Edit') }}
    </x-button-link>
</x-app-layout>
