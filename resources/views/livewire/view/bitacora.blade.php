
<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-700 dark:border-gray-600">
    <div class="items-center justify-start mb-8 mt-4 sm:flex">
        {{-- <h1 class="font-bold text-2xl text-check-blue drop-shadow-lg">@lang('messages.label.ots')</h1> --}}
        <h1 class="text-xl mb-4">Bitacora de mantenimientos</h1>
    </div>

    <div class="border border-gray-200 rounded-lg shadow-md px-4">


        {{-- Datos Orden de trabajo --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4 mt-8">
            {{-- <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.fechaInicio')</label>
                <x-input type="date" wire:model="fecha_mantenimiento" id="focus"  class="focus:ring-check-blue focus:border-check-blue"/>
            </div> --}}
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">Nro. de orden de trabajo</label>
                <x-ots_mantenimiento />
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">Fotos del mantinimiento</label>
                <x-native-select wire:model="tipo_fotos" wire:change="$emit('selection', $event.target.value)" class="focus:ring-check-blue focus:border-check-blue">
                    <option></option>
                    <option value="antes">Antes</option>
                    <option value="despues">Despues</option>
                </x-native-select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4 mt-8">
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">Foto Nro. 1 - {{ $atr_fotos }}</label>
                {{-- <input wire:model="pdf_pre_oper" type="file" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-gray-200 outline-none focus:ring-check-blue focus:border-check-blue disabledDocCC"> --}}
                <input id="" wire:model="foto1" type="file" class="block w-full text-sm text-slate-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-green-50 file:text-check-blue
                        hover:file:bg-green-100">
                @error('pdf_pre_oper') <span class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">Foto Nro. 2 - {{ $atr_fotos }}</label>
                {{-- <input wire:model="pdf_pre_preCli" type="file" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-gray-200 outline-none focus:ring-check-blue focus:border-check-blue disabledDocCC"> --}}
                <input id="" wire:model="foto2" type="file" class="block w-full text-sm text-slate-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-green-50 file:text-check-blue
                        hover:file:bg-green-100">
                @error('pdf_pre_preCli') <span class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 mt-8">
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">Observaciones generales de la actividad</label>
                <x-textarea wire:model="observaciones" placeholder="Por favor indique cual es su Incidencia de forma Detallada" class="focus:ring-check-blue focus:border-check-blue"/>
            </div>
        </div>

        {{-- Boton de registro --}}
        <div class="flex items-center justify-end mt-8 mb-8">
            <x-boton />
        </div>
    </div>
</div>





