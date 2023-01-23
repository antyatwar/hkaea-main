<div>
    <x-app.hero>
        <img src="{{ asset('/images/hero-school.jpg') }}" alt="{{ __(config('app.fullname')) }}" class="w-full" />

        <div class="absolute inset-0 left-4 top-4 hidden md:block">
            <div class="inline-grid gap-2">
                <a href="#school" class="inline-flex items-center gap-1 bg-white text-red-800 border-2 border-red-800 px-10 py-2 rounded-full group hover:bg-red-800">
                    <img src="{{ asset('/images/icon-menu-4.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 group-hover:hidden" />
                    <img src="{{ asset('/images/icon-menu-4.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 hidden group-hover:inline" />
                    <span class="group-hover:text-white">{{ __('School') }}</span>
                </a>
                <a href="#school-photos" class="inline-flex items-center gap-1 bg-white text-red-800 border-2 border-red-800 px-10 py-2 rounded-full group hover:bg-red-800">
                    <img src="{{ asset('/images/icon-anchor-photo.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 group-hover:hidden" />
                    <img src="{{ asset('/images/icon-anchor-photo-hover.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 hidden group-hover:inline" />
                    <span class="group-hover:text-white">{{ __('School Photos') }}</span>
                </a>
                <a href="#school-videos" class="inline-flex items-center gap-1 bg-white text-red-800 border-2 border-red-800 px-10 py-2 rounded-full group hover:bg-red-800">
                    <img src="{{ asset('/images/icon-anchor-video.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 group-hover:hidden" />
                    <img src="{{ asset('/images/icon-anchor-video-hover.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 hidden group-hover:inline" />
                    <span class="group-hover:text-white">{{ __('School Videos') }}</span>
                </a>
            </div>
        </div>
    </x-app.hero>

    <div class="max-w-7xl mx-auto px-4 mt-10">
        <x-app.brush id="school">
            {{ __('School') }}
        </x-app.brush>
    </div>

    <div class="max-w-7xl mx-auto px-4 my-10 grid grid-cols-1 md:grid-cols-3 gap-4">
      @foreach($posts as $post)
        <div class="grid gap-4">
              <a href="{{ route('post', $post) }}">
                  <img src="{{ asset('/images/' . $post->image) }}"  alt="{{ $post->title }}" class="w-full" />
              </a>
            <div>
                <span class="bg-red-800 text-white px-4">
                    {{ $post->category->name }}
                </span>
                <span class="ml-4">
                  {{ $post->published_at->format('Y/m/d') }}
                </span>
            </div>
            <h1 class="text-xl font-semibold mb-2">
                <a href="{{ route('post', $post) }}">
                    {{ $post->title }}
                </a>
            </h1>
    </div>

    @endforeach




</div>

<div class="max-w-7xl mx-auto px-4 mt-10">
    <x-app.brush id="school-photos">
        {{ __('School Photos') }}
    </x-app.brush>
</div>

<div class="swiper mySwiper my-10">
    <div class="swiper-wrapper">
        @foreach($photos as $photo)
        <div class="swiper-slide">
            <img class="w-full" src="{{ asset('/images/' . $photo->image) }}"  alt="{{ $photo->title }}"  />
        </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>

<div class="max-w-7xl mx-auto px-4 mt-10">
    <x-app.brush id="school-videos">
        {{ __('School Videos') }}
    </x-app.brush>
</div>

<div class="max-w-7xl mx-auto px-4 my-10 grid grid-cols-1 md:grid-cols-3 gap-4">
      @foreach($videos as $video)
      <div class="grid gap-4">
        <div class="responsive-iframe-container">
            <iframe class="responsive-iframe" src="https://www.youtube.com/embed/{{ $video->videoid }}"></iframe>
        </div>
      </div>
      @endforeach
</div>
</div>
