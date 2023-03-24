
<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-700 dark:border-gray-600">
    <div class="items-center justify-start mb-8 mt-4 sm:flex">
        {{-- <h1 class="font-bold text-2xl text-check-blue drop-shadow-lg">@lang('messages.label.ots')</h1> --}}
        <h1 class="text-xl mb-4">Asignación de orden de trabajo</h1>
    </div>

    <div class="border border-gray-200 rounded-lg shadow-md px-4">

        {{-- Datos Orden de trabajo --}}
        <div class="{{ $atr_info_tikect }}">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-4 mb-4 mt-8">
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">Nro. de Tikect</label>
                <x-input icon="pencil" wire:model="tikect_id" />
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">Creado Por:</label>
                <x-input icon="pencil" wire:model="owner_tikect" />
            </div>
        </div>
        </div>
        {{-- Datos Orden de trabajo --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4 mt-8">
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.fechaInicio')</label>
                <x-input type="date" wire:model="fechaInicio" id="focus" />
            </div>
            <div class="p-2">
                <x-lista-tecnicos></x-lista-tecnicos>
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.idEquipo')</label>
                <x-equipos />
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.tipoMan')</label>
                <x-native-select wire:model="tipoMantenimiento" wire:change="$emit('selection', $event.target.value)">
                    <option></option>
                    <option value="MP">Preventivo</option>
                    <option value="MC">Correctivo</option>
                </x-native-select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4 mt-8 {{ $atr }}">
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.costo_Opera')</label>
                <x-inputs.currency icon="currency-dollar" thousands="." decimal="," precision="2" wire:model="costo_oper"/>
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.costo_preCli')</label>
                <x-inputs.currency icon="currency-dollar" thousands="." decimal="," precision="2" wire:model="costo_preCli" wire:change="$emit('calc', $event.target.value)"/>
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.utilBruta')</label>
                <x-input icon="currency-dollar" thousands="." decimal="," precision="2" wire:model="porcen" value="{{ $porcen }}" class="cursor-none"/>
            </div>
            
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4 mt-8 {{ $atr }}">
            
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.presupuesto1')</label>
                <input wire:model="pdf_pre_oper" type="file" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-gray-200 outline-none focus:border-indigo-500 disabledDocCC">
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.presupuesto2')</label>
                <input wire:model="pdf_pre_preCli" type="file" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-gray-200 outline-none focus:border-indigo-500 disabledDocCC">
            </div>
        </div>

        {{-- Boton de registro --}}
        <div class="flex items-center justify-end mt-8 mb-8">
            <x-boton />
        </div>
    </div>
</div>




