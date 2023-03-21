<div>
    <div class="flex justify-between">
        <div class="w-full mt-4">
            <img src="{{ asset('images/banner_resIndex.png') }}" class="w-full" alt="">
        </div>
    </div>
    <div class="mt-2 ml-8 mb-8 w-full">
        <h1 class="px-2 text-2xl font-extrabold text-check-blue dark:text-white">
            ¡Le damos la bienvenida a CheckMas!
        </h1>
        <p class="mt-2 px-2 text-base font-bold text-gray-600">
            Cuentanos un poco mas sobre Usted para que podamos personalizar su experiencia...
        </p>

    </div>
    <div class="grid grid-cols-1 mr-4 md:grid-cols-4 ml-10 mt-12">
        <x-select label="¿Cuál es el Nombre de tu Empresa?" placeholder="Selecione..." :options="['BANCO DEL TESORO', 'TRX', 'Otra']" wire:model.defer="tipoEmpresa" />
    </div>
    <div class="flex items-center justify-start mt-10 ml-8">
        <x-boton />
    </div>

</div>

