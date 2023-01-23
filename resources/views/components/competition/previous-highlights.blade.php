<div class="max-w-7xl mx-auto px-4 mt-10">
    <x-app.brush id="previous-highlights">
        {{ __('Previous Highlights') }}
    </x-app.brush>
</div>

<div class="max-w-7xl mx-auto px-4 my-10 grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach($competition->highlights as $highlight)
    <div class="grid gap-4">
        <div class="responsive-iframe-container">
            <iframe class="responsive-iframe" src="{{ $highlight['youtube_link'] }}"></iframe>
        </div>
    </div>
    @endforeach
</div>
