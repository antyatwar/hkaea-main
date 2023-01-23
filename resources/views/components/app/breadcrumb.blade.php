<div class="bg-zinc-800 text-white py-4 pl-4 lg:pl-0 {{ request()->routeIs('home') ? 'hidden' : '' }}">
    <div class="max-w-7xl mx-auto">
        <a href="{{ route('home') }}">{{ __('Home') }}</a> / {{ $title ?? '' }}
    </div>
</div>