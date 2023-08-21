<x-layout>

    <main id="main" class="font-open max-w-6xl mx-auto mb-10 space-y-6 px-4 md:px-0">
        <article>
            <h1 class="font-semibold flex flex-col justify-between flex-1 text-3xl clamp one-line text-center mt-10">
                {{ $title->abr}} {{ $investigator->name}}
            </h1>

            <!-- Datos de contacto -->
            <div class="md:grid md:grid-cols-4 md:grid-rows-4 my-16">

                <div id="div1" class="md:row-span-4 md:col-span-2 flex justify-center items-center mb-10 md:mb-0">
                    <img class="w-3/8 md:w-1/2 max-w-1/2 min-w-1/4" src="{{ Voyager::image( $investigator->picture ) }}">
                </div>

                <div id="div2" class="md:col-span-2 md:row-span-4 md:col-start-3 md:col-end-5 text-sm sm:text-base md:text-sm lg:text-base grid auto-rows-min mt-5 md:mt-0 content-center justify-center md:justify-start">
                    @if($investigator->email != 'No proporcionado')
                    <div class="my-1 font-open text-color-links flex items-center">
                        <img width="20px" id="envelope" src="/images/icons/icons8-envelope-96.png" class="bg-image mr-2">
                        <a href="mailto:{{ $investigator->email }}">
                            {!! $investigator->email !!}
                        </a>
                    </div>
                    @endif
                    @if($investigator->number != 'No')
                    <div class="my-1 font-open text-color-links flex items-center">
                        <img width="20px" id="envelope" src="/images/icons/icons8-phone-squared-90.png" class="bg-image mr-2">
                        <a href="tel:{{ $investigator->number }}">
                            {!! $investigator->number !!}
                        </a>
                    </div>
                    @endif
                    @if($investigator->office != 'No')
                    <div class="my-1 font-open flex items-center">
                        <img width="20px" id="envelope" src="/images/icons/icons8-location-pin-100.png" class="bg-image mr-2">
                        {!! $investigator->office !!}
                    </div>
                    @endif
                    @if($investigator->cv != "[]")
                    <div class="my-1 font-open text-color-links flex items-center">
                        <img width="20px" id="envelope" src="/images/icons/icons8-link-128.png" class="bg-image mr-2">
                        <a href="{{Storage::url((json_decode($investigator->cv))[0]->download_link)}}" target="_blank">
                            CV
                        </a>
                    </div>
                    @endif
                    @if($investigator->website)
                    <div class="my-1 font-open text-color-links flex items-center">
                        <img width="20px" id="envelope" src="/images/icons/icons8-researchgate-96.png" class="bg-image mr-2">
                        @if(str_starts_with($investigator->website,'http'))
                            <a href="{{ $investigator->website }}" target="_blank">
                            ResearchGate
                            </a>
                        @else
                            <a href="http://{{ $investigator->website }}" target="_blank">
                            ResearchGate
                            </a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>

            <!-- Información (descripción, libros, etc) -->
            <div x-data="setup()" class="md:px-8 lg:px-0 hidden md:block">
                <ul class="flex justify-center items-center">
                    <template x-for="(tab, index) in tabs" :key="index">
                        <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8 md:text-base"
                            :class="activeTab===index ? 'bg-color-fondo text-color-dorado border-color-dorado' : ''" @click="activeTab=index"
                            x-text="tab"></li>
                    </template>
                </ul>
                <div class="bg-color-fondo p-16 text-center mx-auto">
                    <div x-show="activeTab===0">
                        <div class="text-justify font-semibold">Descripción</div>
                        <div class="text-justify pt-6 pb-8">{!! $investigator->description !!}</div>
                        <div class="text-justify font-semibold">Educación</div>
                        <div class="list-inside mt-8">
                            {{--
                            @foreach ($licenciatura as $study)
                            <li class="text-justify ml-7 mb-2">{{ $study->level }} en {{ $study->career }}. {{ $study->school }}. {{ $study->period }}.</li>
                            @endforeach
                            @foreach ($maestria as $study)
                            <li class="text-justify ml-7 mb-2">{{ $study->level }} en {{ $study->career }}. {{ $study->school }}. {{ $study->period }}.</li>
                            @endforeach
                            @foreach ($licenciatura as $study)
                            <li class="text-justify ml-7 mb-2">{{ $study->level }} en {{ $study->career }}. {{ $study->school }}. {{ $study->period }}.</li>
                            @endforeach
                            --}}
                            @foreach ($estudios as $study)
                                <li class="text-justify ml-7 mb-2">{{ $study->level }} en {{ $study->career }}. {{ $study->school }}. {{ $study->period }}.</li>
                            @endforeach
                        </div>
                    </div>

                    <div x-show="activeTab===1">
                        <div class="text-justify font-semibold">Artículos y tesis publicadas</div>
                        <div class="pt-6 pb-8">
                            @foreach ($investigator->publications as $publication)
                            <div class="text-justify mb-2" style="margin-left: 2em; text-indent: -2em">{!! $publication->apa !!}</div>
                            @endforeach
                        </div>
                        <div class="text-justify font-semibold">Capitulos de Libro</div>
                        <div class="pt-6 pb-8">
                            @foreach ($capitulos as $capitulo)
                            <div class="text-justify mb-2" style="margin-left: 2em; text-indent: -2em">{!! $capitulo->apa !!}</div>
                            @endforeach
                        </div>
                        <div class="text-justify font-semibold">Libros:</div>
                        <div class="pt-6 pb-8 mx-5 flex justify-around flex-wrap items-center">
                            @foreach ($investigator->books as $book)
                            <div class="flex flex-col text-center mx-2 mt-8">
                                @php
                                    $revisarLiga = Illuminate\Support\Str::startsWith($book->url, ['http://', 'https://']);
                                @endphp
                                <a href="{{ $revisarLiga ? $book->url : 'https://'.$book->url }}" target="_blank"><img src="{{ Voyager::image( $book->cover ) }}" width="200"></a>
                                <p class="text-center mb-2 mt-2">{!! $book->name !!}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div x-show="activeTab===2">
                        <div class="text-justify  font-semibold">Ligas de Interes:</div>
                        <div class="pt-6 pb-8">
                            <div class="text-justify mb-2">
                                @foreach($investigator->sites as $site)
                                {!! $site->name !!}:
                                <div class="my-2">
                                    <a href="{{ $site->url }}" class="text-justify text-color-links">{!! $site->url !!}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div x-show="activeTab===3">
                        <div class="text-justify  font-semibold">Contacto:</div>
                        <div class="pt-6 pb-8">
                            <div class="text-justify mb-2">
                                {!! $investigator->contacto !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:hidden">
                <div class="mx-8 text-center text-sm sm:text-base">
                    <div class="w-3/5 py-2 px-4 text-color-dorado border-b-8 border-color-dorado text-base sm:text-lg bg-cover bg-color-fondo">
                        Información
                    </div>
                    <div class="bg-color-fondo">
                        <div class="p-8">
                            <div class="text-justify font-semibold text-base sm:text-lg">Descripción</div>
                            <div class="text-justify pt-6 pb-8">{!! $investigator->description !!}</div>
                            <div class="text-justify font-semibold text-base sm:text-lg">Educación</div>
                            <div class="list-inside mt-8">
                                {{--
                                @foreach ($licenciatura as $study)
                                <li class="text-justify ml-7 mb-2">{{ $study->level }} en {{ $study->career }}. {{ $study->school }}. {{ $study->period }}.</li>
                                @endforeach
                                @foreach ($maestria as $study)
                                <li class="text-justify ml-7 mb-2">{{ $study->level }} en {{ $study->career }}. {{ $study->school }}. {{ $study->period }}.</li>
                                @endforeach
                                @foreach ($doctorado as $study)
                                <li class="text-justify ml-7 mb-2">{{ $study->level }} en {{ $study->career }}. {{ $study->school }}. {{ $study->period }}.</li>
                                @endforeach
                                --}}
                                @foreach ($estudios as $study)
                                    <li class="text-justify ml-7 mb-2">{{ $study->level }} en {{ $study->career }}. {{ $study->school }}. {{ $study->period }}.</li>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="w-3/5 py-2 px-4 text-color-dorado border-b-8 border-color-dorado text-base sm:text-lg bg-cover bg-color-fondo mt-10">
                        Investigaciones
                    </div>
                    <div class="bg-color-fondo">
                        <div class="p-8">
                            <div class="text-justify font-semibold text-base sm:text-lg">Artículos y tesis publicadas</div>
                            <div class="pt-6 pb-8">
                                @foreach ($investigator->publications as $publication)
                                <div class="text-justify mb-2" style="margin-left: 2em; text-indent: -2em">{!! $publication->apa !!}</div>
                                @endforeach
                            </div>
                            <div class="text-justify font-semibold text-base sm:text-lg">Capitulos de Libro</div>
                            <div class="pt-6 pb-8">
                                @foreach ($investigator->publications as $publication)
                                <div class="text-justify mb-2" style="margin-left: 2em; text-indent: -2em">{!! $publication->apa !!}</div>
                                @endforeach
                            </div>
                            <div class="text-justify font-semibold text-base sm:text-lg">Libros:</div>
                            <div class="pt-6 pb-8 mx-5 flex justify-around flex-wrap items-center">
                                @foreach ($investigator->books as $book)
                                <div class="flex flex-col text-center mt-8">
                                    @php
                                        $revisarLiga = Illuminate\Support\Str::startsWith($book->url, ['http://', 'https://']);
                                    @endphp
                                    <a href="{{ $revisarLiga ? $book->url : 'https://'.$book->url }}" target="_blank"><img src="{{ Voyager::image( $book->cover ) }}" width="200"></a>
                                    <p class="text-center mb-2 mt-2">{!! $book->name !!}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="w-3/5 py-2 px-4 text-color-dorado border-b-8 border-color-dorado text-base sm:text-lg bg-cover bg-color-fondo mt-10">
                        Ligas de interes
                    </div>
                    <div class="bg-color-fondo">
                        <div class="p-8">
                            <div class="text-justify font-semibold text-base sm:text-lg">Ligas de interes:</div>
                            <div class="pt-6 pb-8">
                                @foreach ($investigator->sites as $site)
                                <div class="text-justify mb-2">
                                    {!! $site->name !!}:
                                    <div class="my-2">
                                        <a href="{{ $site->url }}" class="text-justify text-color-links">{!! $site->url !!}</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categorías y tags -->
            <div class="my-16 px-10">
                <i> Areas de Conocimiento </i>
                <div class="flex flex-wrap justify-center md:justify-start mt-2">
                    @foreach ($investigator->categories as $category)
                    <div class="lg:block pb-6 mx-2">
                        <a href="/search?search=&filtercategory[]={{ $category->id }}" class="transition-colors duration-300 text-xs font-semibold bg-color-gris-claro hover:bg-color-gris rounded-full py-2 px-8"
                        >{{ $category->name}}</a>
                    </div>
                    @endforeach
                </div>
                <i> Etiquetas </i>
                <div class="flex flex-wrap justify-center md:justify-start mt-2">
                    @foreach ($investigator->tags as $tag)
                    <div class="lg:block pb-6 mx-2">
                        <a href="/search?search=&filtertag[]={{ $tag->id }}" class="transition-colors duration-300 text-xs font-semibold bg-color-gris-claro hover:bg-color-gris rounded-full py-2 px-8"
                        >{{ $tag->name}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </article>
    </main>

    <script>
        function setup() {
            return {
                activeTab: 0,
                tabs: [
                    "Información",
                    "Investigaciones",
                    "Ligas de Interes",
                    "Contacto"
                ]
            };
        };
    </script>

    <script>
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        header.classList.remove("fixed");
        var main = document.getElementById("main");
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
