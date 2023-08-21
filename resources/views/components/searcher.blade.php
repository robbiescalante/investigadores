<div class="mt-20 justify-between mx-4">
    <h1 class="pb-2 text-3xl md:text-4xl">
        <span class="text-black font-open font-semibold">Búsqueda</span>
    </h1>

    <div class="w-36 md:w-44 h-2 bg-black"></div>

    <h1 class="pb-2 text-xl pt-12 md:pt-16">
        <span class="text-black font-open">Búsqueda por nombre</span>
    </h1>

        <!-- Search -->
    <div class="mt-3 mb-3 p-1">
        <div class="">
            <form method="GET" action="{{ URL::current()}}">

                <div class="grid gap-2 grid-cols-3">
                    <div class="col-span-2">
                        <input type="text"
                            name="search"
                            placeholder="Iniciar búsqueda"
                            class="font-open bg-transparent placeholder-color-gris font-medium text-sm pl-4 pr-4 bg-white border border-color-gris rounded-xl py-2 w-full"
                            value="{{ request('search') }}"
                        >
                    </div>
                    <div class="col-span-1">
                        <button class="font-open text-center bg-color-dorado text-white rounded-xl p-2 w-full" type="submit" id="filter">Buscar</button>
                    </div>
                </div>

                <div class="flex items-center">
                    @include("components.checkbox")
                </div>

            </form>
        </div>



    </div>

    <div class="w-full h-2 bg-color-gris-claro"></div>
</div>


