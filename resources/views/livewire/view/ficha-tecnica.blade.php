<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-700 dark:border-gray-600">
    <div class="items-center justify-start mb-8 mt-4 sm:flex">
        <time class="mb-1 text-2xl font-extrabold text-blue-900 drop-shadow-lg sm:order-last sm:mb-0">FICHA TECNICA EQUIPO REFRIGERACION Y AIRE ACONDICIONADO</time>
    </div>

    <div class="p-2">
        <label class="text-xs font-extrabold text-black drop-shadow-lg">@lang('messages.label.carTec')</label>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-7 gap-4 mb-4">
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.V')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.Amp')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.Watts')</label>
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
        <div class="p-2">
            <label class="opacity-60 mb-1 block text-sm font-medium text-italblue">@lang('messages.label.cargaRefri')</label>
            <x-input icon="pencil" wire:model="email" />
        </div>
    </div>
    
    <div class="p-2">
        <label class="text-xs font-extrabold text-black drop-shadow-lg">@lang('messages.label.motor')</label>
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
    <div class="p-2">
        <label class="text-xs font-extrabold text-black drop-shadow-lg">@lang('messages.label.compresor')</label>
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
