
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div id="cosa" class="bg-color-azul md:h-20 w-full text-open">
    <div id="header" class="fixed top-0 z-50 w-full text-white bg-color-azul p-9">
    <div x-data="{ open: false }" class="flex flex-col md:items-center md:flex-row w-full flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="p-4 flex flex-row justify-between">
            <div class="flex justify-start">
                <a href="{{ route('home') }}">
                    <img class="w-48 sm:w-60" id="logo-cucea" src="{{ asset('images/udg/logo-cucea-colores-blanco.png') }}" >
                </a>
            </div>
        <button id="boton" class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden md:flex justify-end md:flex-row ">
            <a class="px-4 py-2 mt-2 ml-4 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/search">Buscar Investigadores</a>
            {{-- <a class="px-4 ml-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/">Inicio</a> --}}
        </div>
        </nav>
    </div>
    </div>
</div>
<!-- Wave superior -->
<svg id="ola" class="gradientt" data-v-2190dce6="" viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g data-v-2190dce6="" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g data-v-2190dce6="" transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
        <path data-v-2190dce6="" d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
        <path data-v-2190dce6="" d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
        <path data-v-2190dce6="" d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
      </g>
      <g data-v-2190dce6="" transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero"><path data-v-2190dce6="" d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
      </g>
    </g>
</svg>




