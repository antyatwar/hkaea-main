<div class="overflow-auto no-scrollbar whitespace-nowrap flex space-x-7 px-4 lg:ml-8 items-end">
    <a href="{{ route('about') }}" class="py-2 lg:py-0 lg:flex lg:flex-col items-center group">
        <img src="{{ asset('/images/icon-menu-1.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 md:w-10 lg:w-13 mx-auto" />
        <span class="group-hover:text-red-800">{{ __('About') }}</span>
    </a>
    <a href="{{ route('news') }}" class="py-2 lg:py-0 lg:flex lg:flex-col items-center group">
        <img src="{{ asset('/images/icon-menu-2.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 md:w-10 lg:w-13 mx-auto" />
        <span class="group-hover:text-red-800">{{ __('News') }}</span>
    </a>
    <a href="{{ route('competition', \App\Models\Competition::latest()->first()) }}" class="py-2 lg:py-0 lg:flex lg:flex-col items-center group">
        <img src="{{ asset('/images/icon-menu-3.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 md:w-10 lg:w-13 mx-auto" />
        <span class="group-hover:text-red-800">{{ __('Competition') }}</span>
    </a>
    <a href="{{ route('performance') }}" class="py-2 lg:py-0 lg:flex lg:flex-col items-center group">
        <img src="{{ asset('/images/icon-menu-4.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 md:w-10 lg:w-13 mx-auto" />
        <span class="group-hover:text-red-800">{{ __('Performance') }}</span>
    </a>
    <a href="{{ route('exchange') }}" class="py-2 lg:py-0 lg:flex lg:flex-col items-center group">
        <img src="{{ asset('/images/icon-menu-5.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 md:w-10 lg:w-13 mx-auto" />
        <span class="group-hover:text-red-800">{{ __('Exchange') }}</span>
    </a>
    <a href="{{ route('exhibition') }}" class="py-2 lg:py-0 lg:flex lg:flex-col items-center group">
        <img src="{{ asset('/images/icon-menu-6.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 md:w-10 lg:w-13 mx-auto" />
        <span class="group-hover:text-red-800">{{ __('Exhibition') }}</span>
    </a>
    <a href="#" class="py-2 lg:py-0 lg:flex lg:flex-col items-center group">
        <img src="{{ asset('/images/icon-menu-7.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 md:w-10 lg:w-13 mx-auto" />
        <span class="group-hover:text-red-800">{{ __('Training/Workshop') }}</span>
    </a>
    <a href="{{ route('school') }}" class="py-2 lg:py-0 lg:flex lg:flex-col items-center group">
        <img src="{{ asset('/images/icon-menu-8.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 md:w-10 lg:w-13 mx-auto" />
        <span class="group-hover:text-red-800">{{ __('School') }}</span>
    </a>
    <a href="{{ route('cooperation') }}" class="py-2 lg:py-0 lg:flex lg:flex-col items-center group">
        <img src="{{ asset('/images/icon-menu-9.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 md:w-10 lg:w-13 mx-auto" />
        <span class="group-hover:text-red-800">{{ __('Cooperation/Volunteer') }}</span>
    </a>
    <a href="{{ route('contact') }}" class="py-2 lg:py-0 lg:flex lg:flex-col items-center group">
        <img src="{{ asset('/images/icon-menu-10.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 md:w-10 lg:w-13 mx-auto" />
        <span class="group-hover:text-red-800">{{ __('Contact') }}</span>
    </a>
</div>
