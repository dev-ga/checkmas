<div>
    <section class=" dark:bg-gray-900">
        <!-- Card Grid -->
        <div class="grid gap-8 text-neutral-600 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            
            @foreach ($data as $item)
            <!-- Card Item -->
            <div class="my-8 rounded shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-300 hover:-translate-y-1">
                <!-- Clickable Area -->
                <a _href="link" class="cursor-pointer">
                    <figure>
                        <!-- Image -->
                        <img
                            src="{{ asset('/storage/'.$item->foto1_antes) }}"
                            class="rounded-t h-auto w-auto object-cover" />

                        <figcaption class="p-4">
                            <!-- Title -->
                            <p class="text-lg mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                                <!-- Post Title -->
                                {{ $item->nro_ot }}
                            </p>

                            <!-- Description -->
                            <small class="leading-5 text-gray-500 dark:text-gray-400">
                                <!-- Post Description -->
                                Antes <br>
                                Observaciones: {{ $item->observaciones_antes }}
                            </small>
                        </figcaption>
                    </figure>
                </a>
            </div>
            <div class="my-8 rounded shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-300 hover:-translate-y-1">
                <!-- Clickable Area -->
                <a _href="link" class="cursor-pointer">
                    <figure>
                        <!-- Image -->
                        <img
                            src="{{ asset('/storage/'.$item->foto2_antes) }}"
                            class="rounded-t h-auto w-auto object-cover" />

                        <figcaption class="p-4">
                            <!-- Title -->
                            <p class="text-lg mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                                <!-- Post Title -->
                                {{ $item->nro_ot }}
                            </p>

                            <!-- Description -->
                            <small class="leading-5 text-gray-500 dark:text-gray-400">
                                <!-- Post Description -->
                                Antes <br>
                                Observaciones: {{ $item->observaciones_antes }}
                            </small>
                        </figcaption>
                    </figure>
                </a>
            </div>
            <div class="my-8 rounded shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-300 hover:-translate-y-1">
                <!-- Clickable Area -->
                <a _href="link" class="cursor-pointer">
                    <figure>
                        <!-- Image -->
                        <img
                            src="{{ asset('/storage/'.$item->foto2_despues) }}"
                            class="rounded-t h-auto w-auto object-cover" />

                        <figcaption class="p-4">
                            <!-- Title -->
                            <p class="text-lg mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                                <!-- Post Title -->
                                {{ $item->nro_ot }}
                            </p>

                            <!-- Description -->
                            <small class="leading-5 text-gray-500 dark:text-gray-400">
                                <!-- Post Description -->
                                Despues <br>
                                Observaciones: {{ $item->observaciones }}
                            </small>
                        </figcaption>
                    </figure>
                </a>
            </div>
            <div class="my-8 rounded shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-300 hover:-translate-y-1">
                <!-- Clickable Area -->
                <a _href="link" class="cursor-pointer">
                    <figure>
                        <!-- Image -->
                        <img
                            src="{{ asset('/storage/'.$item->foto2_despues) }}"
                            class="rounded-t h-auto w-auto object-cover" />

                        <figcaption class="p-4">
                            <!-- Title -->
                            <p class="text-lg mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                                <!-- Post Title -->
                                {{ $item->nro_ot }}
                            </p>

                            <!-- Description -->
                            <small class="leading-5 text-gray-500 dark:text-gray-400">
                                <!-- Post Description -->
                                Despues <br>
                                Observaciones: {{ $item->observaciones }}
                            </small>
                        </figcaption>
                    </figure>
                </a>
            </div>
            @endforeach
            <div class="flex justify-end bg-white w-96 px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="p-2">
                    {{-- Paginacion --}}
                    {{ $data->links() }}
                </div>
                
            </div>
        </div>
    </section>
</div>
