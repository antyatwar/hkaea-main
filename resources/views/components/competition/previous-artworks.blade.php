<div class="max-w-7xl mx-auto px-4 mt-10">
    <x-app.brush id="previous-artworks">
        {{ __('Previous Artworks') }}
    </x-app.brush>
</div>

<div class="swiper mySwiper my-10">
    <div class="swiper-wrapper">
        @foreach($competition->artworks as $artwork)
        <div class="swiper-slide">
            <img src="{{ asset('storage/' . $artwork['artwork_image']) }}" alt="{{ __(config('app.fullname')) }}" class="w-full" />
        </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
