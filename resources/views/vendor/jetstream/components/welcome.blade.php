<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-700 dark:border-gray-600">
    <div class="items-center justify-start mb-8 mt-4 sm:flex">
        <time class="mb-1 text-2xl font-extrabold text-blue-900 drop-shadow-lg sm:order-last sm:mb-0">FICHA TECNICA</time>
    </div>

    {{-- qr y tipo --}}
    <div class="flex flex-wrap justify-star">
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.numQR')</label>
            <x-input icon="code" wire:model="email" class="w-32"/>
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.tipo')</label>
            <x-native-select wire:model="tipo" class="w-32">
                <option></option>
                <option value="Compacto">@lang('messages.label.compacto')</option>
                <option value="Fancoil">@lang('messages.label.fancoil')</option>
                <option value="Split">@lang('messages.label.split')</option>
                <option value="Gabinete">@lang('messages.label.gabinete')</option>
                <option value="Otro">@lang('messages.label.otro')</option>
            </x-native-select>
        </div>
    </div>
    {{-- Titulo --}}
    <div class="p-2">
        <label class="text-xs font-extrabold text-black drop-shadow-lg">@lang('messages.label.condensadora')</label>
    </div>

    {{-- CONDENSARODRA --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="flex flex-wrap justify-star">
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.voltaje')</label>
                <x-native-select wire:model="voltaje" class="w-24">
                    <option></option>
                    <option value="110V">110V</option>
                    <option value="220V">220V</option>
                    <option value="380V">380V</option>
                    <option value="440V">440V</option>
                </x-native-select>
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.phases')</label>
                <x-native-select wire:model="phases" class="w-24">
                    <option></option>
                    <option value="1PH">1PH</option>
                    <option value="2PH">2PH</option>
                    <option value="3PH">3PH</option>
                    <option value="otro">Otro</option>
                </x-native-select>
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.refri')</label>
                <x-native-select wire:model="voltaje" class="w-28">
                    <option></option>
                    <option value="R22">R22</option>
                    <option value="RF10A">RF10A</option>
                    <option value="otro">Otro</option>
                </x-native-select>
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.BTU')</label>
                <x-native-select wire:model="voltaje" class="w-28">
                    <option></option>
                    <option value="12.000">12.000</option>
                    <option value="18.000">18.000</option>
                    <option value="24.000">24.000</option>
                    <option value="36.000">36.000</option>
                    <option value="5TON">5TON</option>
                    <option value="7,5TON">7,5TON</option>
                    <option value="10TON">10TON</option>
                    <option value="otro">Otro</option>
                </x-native-select>
            </div>
        </div>
    </div>

    {{-- Caracteristicas tecnicas --}}
    <div class="grid sm:grid-cols-6 md:grid-cols-10 gap-6 mb-4">
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.V')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.Amp')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.nFases')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.BTU')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.refri')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
    </div>
    {{-- label --}}
    <div class="p-2">
        <label class="text-xs font-extrabold text-black drop-shadow-lg">@lang('messages.label.motor')</label>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-10 gap-4 mb-4">
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.marca')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.voltaje')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.corriente')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
    </div>
    {{-- compresor --}}
    <div class="p-2">
        <label class="text-xs font-extrabold text-black drop-shadow-lg">@lang('messages.label.compresor')</label>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.marca')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.voltaje')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.corriente')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.marca')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.voltaje')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.corriente')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.marca')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.voltaje')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.corriente')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
    </div>
    </div>
    <div class="p-2">
        <label class="text-xs font-extrabold text-black drop-shadow-lg">@lang('messages.label.motorUniMa')</label>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.marca')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.voltaje')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.corriente')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4 mt-8">
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.otras')</label>
            <x-textarea wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.observaciones')</label>
            <x-textarea wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.funcionamiento')</label>
            <x-textarea wire:model="email" />
        </div>
    </div>

</div>



