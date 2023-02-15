<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

@livewire('auth.login')
    </x-jet-authentication-card> --}}
    <div class="flex flex-row-reverse ...">
        @livewire('auth.login')
        <x-jet-authentication-card-logo />
      </div>
</x-guest-layout>

