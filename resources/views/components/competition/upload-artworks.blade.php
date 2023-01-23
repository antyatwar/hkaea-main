<div class="max-w-7xl mx-auto px-4 mt-10">
    <div class="max-w-4xl mx-auto">
        <h1 id="upload-artworks" class="text-4xl font-semibold text-center mb-4">
            {{ $competition->title }}
        </h1>

        <hr class="my-4 mx-auto w-3/5 h-2 bg-red-800" />

        {!! $competition->description !!}

        <div class="text-center">
            <a href="{{ route('application', $competition) }}" class="bg-red-800 text-white px-20 py-3 w-60 border-2 border-red-800 hover:text-red-800 hover:bg-white duration-300 inline-block">
                {{ __('Upload Artworks') }}
            </a>
            <p class="text-sm">{{ __('Please read *the rules of the competition* before uploading your artwork') }}</p>
        </div>
    </div>
</div>
