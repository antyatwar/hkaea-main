<div class="max-w-7xl m-auto flex items-center justify-around space-x-1 sm:justify-end sm:space-x-4 mt-2 px-1 sm:px-4">
    <div class="flex justify-between gap-2">
        <a href="https://www.facebook.com/HongKongArtExchangeAssociation/" target="_blank">
            <img src="{{ asset('/images/icon-facebook.svg') }}" alt="{{ __(config('app.fullname')) }}" class="w-7" />
        </a>
        <a href="https://www.instagram.com/" target="_blank">
        <img src="{{ asset('/images/icon-instagram.svg') }}" alt="{{ __(config('app.fullname')) }}" class="w-7" />
        </a>
        <a href="https://wa.me/85284813363" target="_blank">
        <img src="{{ asset('/images/icon-whatsapp.svg') }}" alt="{{ __(config('app.fullname')) }}" class="w-7" />
        </a>
    </div>

    <div class="ml-4 pl-4 border-l-2 border-slate-400">
        <a href="#">
        <img src="{{ asset('/images/icon-cart.svg') }}" alt="{{ __(config('app.fullname')) }}" class="w-7" />
        </a>
    </div>

    <div class="ml-4 pl-4 border-l-2 border-slate-400">
        @auth
        <a href="{{ route('account') }}">
        <img src="{{ asset('/images/icon-account.svg') }}" alt="{{ __(config('app.fullname')) }}" class="w-7" />
        </a>
        @else
        <a href="{{ route('login') }}">
        <img src="{{ asset('/images/icon-account.svg') }}" alt="{{ __(config('app.fullname')) }}" class="w-7" />
        </a>
        @endauth
    </div>

    <div class="border-2 border-slate-400 rounded px-1 sm:px-4 sm:py-1 text-slate-400 hover:bg-red-800 hover:text-white hover:border-white">
        @switch(app()->getLocale())
        @case('en')
        <a href="{{ route(Route::currentRouteName(), array_merge(request()->route()->parameters(), ['locale' => 'zh-hk'])) }}">香港中文</a>
        @break
        @case('zh-hk')
        <a href="{{ route(Route::currentRouteName(), array_merge(request()->route()->parameters(), ['locale' => 'en'])) }}">English</a>
        @break
        @endswitch
    </div>
</div>