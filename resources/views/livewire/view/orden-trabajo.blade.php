<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-700 dark:border-gray-600">
    <div class="items-center justify-start mb-8 mt-4 sm:flex">
        <time class="mb-1 text-2xl font-extrabold text-blue-900 drop-shadow-lg sm:order-last sm:mb-0">@lang('messages.label.ots')</time>
    </div>

    <div class="border border-gray-200 rounded-lg shadow-md px-4">

        {{-- Datos Orden de trabajo --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4 mt-8">
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.fechaInicio')</label>
                <x-input type="date" wire:model="fechaInicio" />
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
                <x-native-select wire:model="tipoMantenimiento">
                    <option></option>
                    <option value="MP">Preventivo</option>
                    <option value="MC">Correctivo</option>
                </x-native-select>
            </div>
        </div>

        {{-- Descripcion del equipo --}}
        {{-- <div class="border border-gray-200 rounded-lg shadow-md px-4">
            <div class="p-2">
                <label class="text-xs font-extrabold text-black drop-shadow-lg">@lang('messages.label.dte')</label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div class="p-2">
                    <ul class="list-disc">
                        <li>Agencia:</li>
                        <li>Estado:</li>
                        <li>Oficina:</li>
                        <li>Piso:</li>
                        <li>Capacidad(BTU):</li>
                        <li>Tipo de Sistema:</li>
                        <!-- ... -->
                    </ul>
                </div>
                <div class="p-2">
                    <label class="font-extrabold text-black drop-shadow-lg">@lang('messages.label.qrConden')</label>
                    {!! QrCode::size(300)->generate('123456') !!}
                </div>
                <div class="p-2">
                    <label class="font-extrabold text-black drop-shadow-lg">@lang('messages.label.qrEva')</label>
                    {!! QrCode::size(300)->generate('123456') !!}
                </div>
            </div>
        </div> --}}

        {{-- Boton de registro --}}
        <div class="flex items-center justify-end mt-8 mb-8">
            <button type="submit" wire:click.prevent="store()" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-red-200 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-200">
                <svg xmlns="http://www.w3.org/2000/svg" wire:loading wire:target="store" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-spin h-5 w-5 mr-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
                <span>CREAR ORDEN</span>
            </button>
        </div>
    </div>
</div>


