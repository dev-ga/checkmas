<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                @livewire('view.mantenimientos-mc')
                @livewire('view.mantenimientos-mp')
        </div>
    </div>
</x-app-layout>