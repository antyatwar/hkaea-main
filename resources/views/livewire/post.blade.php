@props([
'post' => null,
])

<div>
    <div class="max-w-4xl mx-auto">
        <div class="px-4 my-10">
            <img src="{{ asset('/images/' . $post->image) }}" alt="{{ $post->title }}" class="w-full" />

            <div class="my-5">
                <span class="bg-red-800 text-white px-4">
                    {{ $post->category->name }}
                </span>
                <span class="ml-4">
                    {{ $post->published_at->format('Y/m/d') }}
                </span>
            </div>

            <div>
                <h1 class="text-xl font-semibold mb-2">
                    {{ $post->title }}
                </h1>

                {!! $post->content !!}
            </div>
        </div>
    </div>
</div>