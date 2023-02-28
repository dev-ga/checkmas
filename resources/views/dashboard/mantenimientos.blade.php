<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('view.mantenimientos-mc')
            </div>
            <div class=" overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('view.mantenimientos-mp')
            </div>
            
        </div>
    </div>
</x-app-layout>