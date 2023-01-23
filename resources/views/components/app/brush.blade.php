@props(['id' => ''])

<div class="flex justify-center items-center">
    <x-fas-caret-right class="h-7 w-7 text-red-800" />
    <h1 id="{{ $id }}" class="text-4xl px-10 py-2 bg-no-repeat bg-contain bg-center h-16" style="background-image: url({{ asset('/images/bg-paint-brush.png') }});">
        {{ $slot }}
    </h1>
    <x-fas-caret-left class="h-7 w-7 text-red-800" />
</div>