<div class="max-w-7xl mx-auto px-4 mt-10">
    <x-app.brush id="awards-ceremony">
        {{ __('Awards Ceremony') }}
    </x-app.brush>
</div>

<div class="max-w-7xl mx-auto mt-10 px-4">
    <img src="{{ asset('storage/' . $competition->ceremony_image) }}" alt="{{ $competition->title }}" class="w-full" />

    <div class="mt-8">
        {!! $competition->ceremony_content !!}
    </div>
</div>
