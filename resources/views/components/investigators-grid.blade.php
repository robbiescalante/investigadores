@props(['investigators'])

    <div>
        @foreach ($investigators as $investigator)
            <x-investigator-featured-card
                :investigator="$investigator"
            />
        @endforeach
    </div>
