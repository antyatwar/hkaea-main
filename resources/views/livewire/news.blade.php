<div>
    <x-app.hero>
        <img src="{{ asset('/images/hero-news.jpg') }}" alt="{{ __(config('app.fullname')) }}" class="w-full" />
    </x-app.hero>

    <div class="max-w-7xl mx-auto px-4 mt-10 flex flex-col gap-4 lg:flex-row items-start justify-between">
        <h1 class="text-red-800 text-4xl pb-4 inline-block border-b-[6px] border-black">{{ __('News') }}</h1>

        <form wire:submit.prevent="submit">
            {{ $this->form }}
        </form>
    </div>

    <div class="max-w-7xl mx-auto">
        @foreach($posts as $post)
        <div class="px-4 my-5 lg:my-10 grid grid-cols-1 gap-5 lg:grid-cols-3 items-start">
            <div class="col-span-1">
                <a href="{{ route('post', $post) }}">
                    <img src="{{ asset('/images/' . $post->image) }}" alt="{{ $post->title }}" class="max-w-full hover:shadow-lg" />
                </a>
            </div>

            <div class="col-span-2 grid gap-4">
                <div>
                    <span class="bg-red-800 text-white px-4">
                        {{ $post->category->name }}
                    </span>
                    <span class="ml-4">
                        {{ $post->published_at->format('Y/m/d') }}
                    </span>
                </div>
                <div>
                    <h1 class="text-xl font-semibold mb-2">
                        <a href="{{ route('post', $post) }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    {!! Str::limit($post->content, 400) !!}
                </div>
                <div>
                    <a href="{{ route('post', $post) }}">
                        {{ __('Details') }}
                        <x-fas-arrow-right class="text-red-800 w-4 h-4 inline" />
                    </a>
                </div>
            </div>
        </div>
        @endforeach

        <div class="px-4 my-5">
            {{ $posts->links() }}
        </div>
    </div>
</div>
