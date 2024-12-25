<x-app-layout>
    <x-slot:title>
        {{ $job->title }}
    </x-slot:title>

    <x-slot:header>
        {{ $job->title }}
    </x-slot:header>

    <p>The Pay is {{ $job->salary }} per year.</p>
</x-app-layout>
