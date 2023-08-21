
<x-layout>

    <main id="main" class="max-w-6xl mx-auto mt-10 mb-52 px-4">
        @include ('components.searcher')
        @if ($investigators->count())
            <x-investigators-grid :investigators="$investigators" />

            {{ $investigators->links() }}
        @else
            <p class="text-center mt-6">No se encontraron resultados para tu búsqueda.</p>
        @endif
    </main>

    <script>

        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var main = document.getElementById("main");
        var footer = document.getElementById("foter");
        var toToggle = document.querySelectorAll(".toggleColour");
        header.classList.remove("fixed");
        var width = window.innerWidth || document.documentElement.clientWidth|| document.body.clientWidth;

        document.addEventListener("scroll", function () {
            /*Apply classes for slide in bar*/
            scrollpos = window.scrollY;
            if (scrollpos > 30) {
                header.classList.add("fixed");
                //header.classList.remove("p-9");
                //header.classList.add("px-9");
                //header.classList.add("py-4");
                //header.classList.add("bg-opacity-60");
                header.classList.add("shadow");
                if (width <= 768 ){
                    main.classList.add("mt-60");
                }
            } else {
                //header.classList.remove("bg-opacity-60");
                header.classList.remove("shadow");
                header.classList.remove("fixed");
                header.classList.remove("px-9");
                header.classList.remove("py-4");
                header.classList.add("p-9");
                if (width <= 768 ){
                    main.classList.remove("mt-60");
                }

            }
        });
    </script>

</x-layout>
