<div class="p-6 border bg-white border-gray-200 rounded-lg shadow-md dark:bg-gray-700 dark:border-gray-600" hidden>
    <div class="items-center justify-start mb-8 mt-4 sm:flex">
        <time class="mb-1 text-2xl font-extrabold text-blue-900 drop-shadow-lg sm:order-last sm:mb-0">FICHA TECNICA</time>
    </div>

    <div class="border border-gray-200 rounded-lg shadow-md px-4">
        {{-- Titulo Codensadora --}}
        <div class="p-2">
            <label class="text-xs font-extrabold text-black drop-shadow-lg">@lang('messages.label.condensadora')</label>
        </div>
        {{-- QR y Type Condensadora --}}
        <div class="flex flex-wrap justify-star">
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.numQR')</label>
                <x-conden />
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.tipo')</label>
                <x-native-select wire:model="tipoConden" wire:change="$emit('selection', $event.target.value)" class="w-32">
                    <option></option>
                    <option value="compacto">@lang('messages.label.compacto')</option>
                    <option value="fancoil">@lang('messages.label.fancoil')</option>
                    <option value="split">@lang('messages.label.split')</option>
                    <option value="gabinete">@lang('messages.label.gabinete')</option>
                    <option value="otro">@lang('messages.label.otro')</option>
                </x-native-select>
            </div>
        </div>
        {{-- Form Condensadora --}}
        <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div class="p-2">
                    <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.voltaje')</label>
                    <x-native-select wire:model="voltaje">
                        <option></option>
                        <option value="110V">110V</option>
                        <option value="220V">220V</option>
                        <option value="380V">380V</option>
                        <option value="440V">440V</option>
                    </x-native-select>
                </div>
                <div class="p-2">
                    <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.phases')</label>
                    <x-native-select wire:model="phases">
                        <option></option>
                        <option value="1PH">1PH</option>
                        <option value="2PH">2PH</option>
                        <option value="3PH">3PH</option>
                        <option value="otro">Otro</option>
                    </x-native-select>
                </div>
                <div class="p-2">
                    <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.refri')</label>
                    <x-native-select wire:model="tipoRefri">
                        <option></option>
                        <option value="R22">R22</option>
                        <option value="RF10A">RF10A</option>
                        <option value="otro">Otro</option>
                    </x-native-select>
                </div>
                <div class="p-2">
                    <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.BTU')</label>
                    <x-native-select wire:model="btu">
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

        {{-- COMPRESOR --}}
        <div class="border border-gray-200 rounded-lg shadow-md px-4">
            {{-- Title Compresor --}}
            <div class="p-2">
                <label class="text-xs font-extrabold text-black drop-shadow-lg">@lang('messages.label.compresor')</label>
            </div>
            {{-- Form Cmpresar --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div class="p-2">
                    <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.tipo')</label>
                    <x-native-select wire:model="tipoCompresor">
                        <option></option>
                        <option value="scroll">@lang('messages.label.scroll')</option>
                        <option value="piston">@lang('messages.label.piston')</option>
                    </x-native-select>
                </div>
                <div class="p-2">
                    <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.marca')</label>
                    <x-input icon="pencil" wire:model="marcaCompresor" />
                </div>
                <div class="p-2">
                    <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.amp')</label>
                    <x-input icon="pencil" wire:model="ampCompresor" />
                </div>
                <div class="p-2">
                    <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.placa')</label>
                    <input id="" wire:model="imgPlacaCompresor" type="file" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-gray-200 outline-none focus:border-indigo-500 disabledDocCC">
                    @error('imgPlacaCompresor') <span class="error text-xs text-red-700">{{ $message }}</span> @enderror
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
                <x-native-select wire:model="tipoVentilador">
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
                <input id="" wire:model="imgEtiqVentilador" type="file" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-gray-200 outline-none focus:border-indigo-500 disabledDocCC">
                @error('imgEtiqVentilador') <span class="error text-xs text-red-700">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="border border-gray-200 rounded-lg shadow-md px-4 mt-8 mb-4" {{ $atr }}>
        {{-- Title Evaporador --}}
        <div class="p-2">
            <label class="text-xs font-extrabold text-black drop-shadow-lg">@lang('messages.label.evaporador') - {{ $label }} - @lang('messages.label.uInter')</label>
        </div>
        <div class="flex flex-wrap justify-star">
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.numQR')</label>
                <x-evaporador />
            </div>
            <div class="p-2 ml-8">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.representativa')</label>
                <input id="" wire:model="imgEvaporador" type="file" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-gray-200 outline-none focus:border-indigo-500 disabledDocCC">
                @error('imgEvaporador') <span class="error text-xs text-red-700">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    {{-- UBICACION --}}
    <div class="border border-gray-200 rounded-lg shadow-md px-4 mt-8">
        {{-- Title Ubicacion --}}
        <div class="p-2">
            <label class="text-xs font-extrabold text-black drop-shadow-lg">@lang('messages.label.ubicacion')</label>
        </div>
        {{-- Form Ubicacion --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.oficina')</label>
                <x-input icon="pencil" wire:model="oficina" />
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.piso')</label>
                <x-input icon="pencil" wire:model="piso" />
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.agencia')</label>
                <x-agencias />
            </div>
            <div class="p-2">
                <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.estado')</label>
                <x-estados />
            </div>
        </div>
    </div>

    <div class="flex items-center justify-end mt-8 mb-8">
        <button type="submit" wire:click.prevent="store()" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-red-200 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-200">
            <svg xmlns="http://www.w3.org/2000/svg" wire:loading wire:target="store" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-spin h-5 w-5 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
            <span> REGISTRAR</span>
        </button>
    </div>
</div>

<div class="flex flex-col sm:flex">
    <div class="mx-4 -my-2 overflow-x-auto sm:mx-4 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <h1 class="font-bold text-2xl text-gray-700 drop-shadow-lg">Fichas Tecnicas</h1>
            <div class="py-5 mt-4">
                <div class="flex justify-between">
                    <input wire:model="buscar" type="search" name="buscar" class="border-b border-gray-200 py-2 text-sm rounded-full sm:w-1/3 md:w-1/4 shadow-lg" placeholder="Buscar..." autocomplete="off">
                </div>
            </div>
            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg shadow-lg mb-8">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                UID
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Condensadora
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Voltaje
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Phases
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Refrigerante
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                BTU
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Compresor
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Marca
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Compresor(AMP)
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                QR
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                        @foreach ($data as $item)
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->uid }}</td>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->tipoConden }}</td>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->voltaje }}</td>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->phases }}</td>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->tipoRefri }}</td>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->btu }}</td>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->tipoCompresor }}</td>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->marcaCompresor }}</td>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $item->ampCompresor }}</td>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
                                  </svg>  
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- Div para la paginacion --}}
                <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
                    {{-- Paginacion --}}
                    {{ $data->links() }}
                </div>
                {{-- Fin Div paginacion --}}
            </div>
        </div>
    </div>
</div>