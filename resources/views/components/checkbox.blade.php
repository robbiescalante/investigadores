<div class="w-full mt-4">
    <div x-data=@if(isset($_GET['filtercategory'])){show:true} @else {show:false} @endif class="rounded-3xl mb-2">
        <div @click="show=!show" class="border border-color-gris-claro bg-color-gris-clarote px-10 py-6 rounded-lg" id="headingOne">
            <button class="font-open font-medium text-black hover:text-color-dorado focus:outline-none" type="button">
            Areas de Conocimiento
            </button>
        </div>
        <script type="text/javascript">
            function verMas(){
                var div = document.getElementById("vermas");
                var btn = document.getElementById("btn_vermas");
                div.style.display = "block";
                btn.style.display = "none";
            }
        </script>
        <div x-show="show" class="mt-2 b order border-color-gris-claro px-10 py-6 rounded-lg">
            <div class="space-y-2 lg:space-y-2 lg:space-x-8">
                <div class=" md:grid md:grid-cols-4">
                    @foreach ($categories as $index=>$category)
                        @php
                            if($index>=8){
                                break;
                            }
                            $checked = [];
                            if(isset($_GET['filtercategory']))
                            {
                                $checked = $_GET['filtercategory'];
                            }
                        @endphp
                        <div class="mt-2 md:col-span-1">
                            <input type="checkbox" name="filtercategory[]" class="font-open" value="{{ $category->id }}"
                                @if (in_array($category->id, $checked))
                                    checked
                                @endif
                            />    {{ ucwords($category->name) }}
                        </div>
                    @endforeach
                    @if($categories->count() > 8)
                        @if(!isset($_GET['filtercategory']))
                            <a class="font-open text-center bg-color-azul text-white rounded-xl p-1" onclick="verMas()" id="btn_vermas" style="display: flex; margin-top: .5cm; justify-content: center;">Ver mas</a>
                            <div name=vermas id="vermas" style="display: none;">
                        @else
                            <div name=vermas id="vermas">
                        @endif
                        @foreach ($categories as $index=>$category)
                            @php
                                if($index<8){
                                    continue;
                                }
                                $checked = [];
                                if(isset($_GET['filtercategory']))
                                {
                                    $checked = $_GET['filtercategory'];
                                }
                            @endphp
                            <div class="mt-2 md:col-span-1">
                                <input type="checkbox" name="filtercategory[]" class="font-open" value="{{ $category->id }}"
                                    @if (in_array($category->id, $checked))
                                        checked
                                    @endif
                                />    {{ ucwords($category->name) }}
                            </div>
                        @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div x-data=@if(isset($_GET['filtertag'])){show:true} @else {show:false} @endif class="rounded-sm">
        <div @click="show=!show" class="border border-color-gris-claro bg-color-gris-clarote px-10 py-6 rounded-lg" id="headingOne">
            <button  class="font-open font-medium text-black hover:text-color-dorado focus:outline-none" type="button">
            Etiquetas
            </button>
        </div>
        <div x-show="show" class="mt-2 border border-color-gris-claro px-10 py-6 rounded-lg">
            <div class="space-y-2 lg:space-y-2 lg:space-x-8">

                <div class="sm:grid sm:grid-cols-4">
                    @foreach ($tags as $index=>$tag)
                        @php
                            if($index>=8){
                                break;
                            }
                            $checked = [];
                            if(isset($_GET['filtertag']))
                            {

                                $checked = $_GET['filtertag'];
                            }
                        @endphp
                        <div class="mt-2 sm:col-span-1">
                            <input type="checkbox" name="filtertag[]" class="font-open" value="{{ $tag->id }}"
                                @if (in_array($tag->id, $checked))
                                    checked
                                @endif
                            />      {{ ucwords($tag->name) }}
                        </div>
                    @endforeach
                    @if($tags->count() > 8)
                        @if(!isset($_GET['filtertag']))
                            <a class="font-open text-center bg-color-azul text-white rounded-xl p-1" onclick="verMas()" id="btn_vermas">Ver mas</a>
                            <div name=vermas id="vermas" style="display: none;">
                        @else
                            <div name=vermas id="vermas">
                        @endif
                        @foreach ($tags as $index=>$tag)
                            @php
                                if($index<8){
                                    continue;
                                }
                                $checked = [];
                                if(isset($_GET['filtertag']))
                                {
                                    $checked = $_GET['filtertag'];
                                }
                            @endphp
                            <div class="mt-2 sm:col-span-1">
                                <input type="checkbox" name="filtertag[]" class="font-open" value="{{ $tag->id }}"
                                    @if (in_array($tag->id, $checked))
                                        checked
                                    @endif
                                />      {{ ucwords($tag->name) }}
                            </div>
                        @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
