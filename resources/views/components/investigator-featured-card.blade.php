@props(['investigator'])

<article
    class="px-2">
    <div class="hover:shadow-lg rounded-xl p-4">

        <div class="py-4 md:grid md:grid-rows-3 md:gap-x-8 md:grid-cols-7">

            <div class="md:row-span-3 md:col-span-3">
                <a class="flex justify-center items-center" href="/investigadores/{{ $investigator->slug }}">
                    <img class="w-3/8 md:w-1/2 max-w-1/2 min-w-1/4" src="{{ Voyager::image( $investigator->picture ) }}" alt="">
                </a>
            </div>

            <div class="md:row-start-1 md:row-end-2 md:col-start-4 md:col-end-8 flex justify-center md:justify-start ">
                <div class="mt-4">
                    <h1 class="text-2xl lg:text-3xl font-open font-semibold text-center md:text-left hover:text-color-dorado md:flex-grow-0">
                        <a href="/investigadores/{{ $investigator->slug }}">
                            {{ $investigator->abr }} {{ $investigator->name }}
                        </a>
                    </h1>
                </div>
            </div>

            <div class="md:col-span-4 md:row-span-2 text-sm md:text-xs lg:text-sm grid auto-rows-min mt-5 md:mt-0 justify-center md:justify-start">
                <div class="my-1 font-open text-color-iconito flex items-center">
                        <img width="20px" src="/images/icons/icons8-envelope-96.png" class="bg-image mr-3">
                        {!! $investigator->email !!}
                </div>
                    @if($investigator->office != 'No')
                    <div class="my-1 font-open text-color-iconito flex items-center">
                        <img width="20px" height="20px" src="/images/icons/icons8-location-pin-100.png" class="bg-image mr-2">
                        {!! $investigator->office !!}
                    </div>
                    @endif
                    @if ($investigator->number != 'No')
                    <div class="my-1 font-open text-color-iconito flex items-center">
                        <img width="20px" src="/images/icons/icons8-phone-squared-90.png" class="bg-image mr-2">
                        {!! $investigator->number !!}
                    </div>
                    @endif
                    @if ($investigator->website != 'No')
                    <div class="my-1 font-open text-color-iconito flex items-center">
                        <img width="20px" src="/images/icons/icons8-researchgate-96.png" class="bg-image mr-2">
                        ResearchGate
                    </div>
                    @endif
                <div class="my-1 font-open text-color-iconito flex items-center">
                    <img width="20px" src="/images/icons/icons8-link-128.png" class="bg-image mr-2">
                        CV
                </div>
            </div>
        </div>
    </div>
<div class="my-6 w-full h-1 bg-color-gris-clarote"></div>
</article>


