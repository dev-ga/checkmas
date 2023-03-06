{{-- <x-layout-tecnicos>

    @livewire('view.orden-trabajo')
    
</x-layout-tecnicos> --}}

<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('view.orden-trabajo')
            </div>
        </div>
    </div>
</x-app-layout>