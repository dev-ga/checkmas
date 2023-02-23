<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-700 dark:border-gray-600">
    <div class="items-center justify-start mb-8 mt-4 sm:flex">
        <time class="mb-1 text-2xl font-extrabold text-blue-900 drop-shadow-lg sm:order-last sm:mb-0">@lang('messages.label.ots')</time>
    </div>

    <div class="border border-gray-200 rounded-lg shadow-md px-4">

        {{-- Datos Orden de trabajo --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4 mt-8">
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.fechaInicio')</label>
                <x-datetime-picker wire:model="fechaInicio" />
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.tecnico')</label>
                <x-native-select wire:model="tecnico">
                    <option></option>
                    <option value="110V">110V</option>
                    <option value="220V">220V</option>
                    <option value="380V">380V</option>
                    <option value="440V">440V</option>
                </x-native-select>
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.idEquipo')</label>
                <x-native-select wire:model="tecnico">
                    <option></option>
                    <option value="110V">110V</option>
                    <option value="220V">220V</option>
                    <option value="380V">380V</option>
                    <option value="440V">440V</option>
                </x-native-select>
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.tipoMan')</label>
                <x-native-select wire:model="tecnico">
                    <option></option>
                    <option value="preventivo">Preventivo</option>
                    <option value="correctivo">Correctivo</option>
                </x-native-select>
            </div>
        </div>
        
        {{-- Descripcion del equipo --}}
        <div class="border border-gray-200 rounded-lg shadow-md px-4">
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
                {!! QrCode::merge(asset('images/check_logo.png'), 0.5, true)
                            ->size(300)->errorCorrection('H')
                            ->generate('2020'); !!}
            </div>
            </div>
        </div>


        {{-- Title Ventilador --}}
        <div class="p-2">
            <label class="text-xs font-extrabold text-black drop-shadow-lg">@lang('messages.label.ventilador')</label>
        </div>
        {{-- Form Cmpresar --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.tipo')</label>
                <x-native-select wire:model="cantidad">
                    <option></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="otro">@lang('messages.label.otro')</option>
                </x-native-select>
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.etiqueta')</label>
                <input id="" wire:model="doc2" type="file" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-gray-200 outline-none focus:border-indigo-500 disabledDocCC">
            </div>
        </div>
    </div>

    
</div>

