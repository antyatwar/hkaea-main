@props([
'featured_posts' => [],
'general_posts' => [],
])

<div class="max-w-7xl m-auto py-5 md:py-10 lg:py-20 px-4">
    <div class="flex justify-center items-center mb-5 md:mb-10">
        <x-fas-caret-right class="h-7 w-7 text-red-800" />
        <h1 class="text-4xl px-7">{{ __('News') }}</h1>
        <x-fas-caret-left class="h-7 w-7 text-red-800" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-14">
        <div>
            <div class="grid gap-4 lg:grid-cols-2 lg:gap-8">
                @foreach($featured_posts as $post)
                <div class="{{ $loop->first ? 'col-span-full' : 'col-span-1' }}">
                    <a href="{{ route('post', $post) }}">
                        <img src="{{ asset('/images/' . $post->image) }}" alt="{{ $post->title }}" class="w-full" />
                    </a>
                    <h1 class="font-semibold text-l mt-2">
                        <a href="{{ route('post', $post) }}">
                            {{ $post->title }}
                        </a>
                    </h1>
                </div>
                @endforeach
            </div>
        </div>

        <div class="grid gap-8 md:gap-4">
            <h1 class="text-2xl border-l-8 pl-4 border-red-800 md:mb-5">{{ __('Competition News') }}</h1>

            @foreach($general_posts as $post)
            <div class="grid grid-cols-1 lg:grid-cols-9 gap-2 lg:gap-6 items-center">
                <div class="col-span-3">
                    <a href="{{ route('post', $post) }}">
                        <img src="{{ asset('/images/' . $post->image) }}" alt="{{ $post->title }}" class="w-full hover:shadow-2xl" />
                    </a>
                </div>

                <div class="col-span-6">
                    <div class="bg-red-800 text-white inline-block px-4">
                        {{ $post->category->name }}
                    </div>

                    <div>
                        {{ $post->published_at->format('Y/m/d') }}
                    </div>

                    <h1 class="font-semibold text-l">
                        <a href="{{ route('post', $post) }}">
                            {{ $post->title }}
                        </a>
                    </h1>
                </div>
            </div>
            @endforeach

            <div class="flex items-center mt-5">
                <a href="{{ route('news') }}" class="font-semibold text-xl pr-2 hover:text-red-800">{{ __('More') }}</a>
                <div class="h-2 w-10 bg-red-800"></div>
            </div>
        </div>
    </div>
</div>
