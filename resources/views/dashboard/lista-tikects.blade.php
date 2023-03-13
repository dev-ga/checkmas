<x-app-layout>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            @livewire('view.lista-tikects')
            @if(Auth::user()->rol == 5 || Auth::user()->rol == 6)
            @livewire('view.orden-trabajo')
            @endif
        </div>
    </div>
</x-app-layout>