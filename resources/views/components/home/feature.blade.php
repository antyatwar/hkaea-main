<div class="parallax bg-fixed bg-cover bg-no-repeat bg-center h-96" style="background-image: url({{ asset('/images/bg-home-parallax.jpg') }});"></div>

<div class="max-w-4xl m-auto text-center pt-10 pb-20 px-4 -mt-40 bg-white border-t-4 border-red-800">
    <h1 class="text-4xl mb-4">{{ __(config('app.fullname')) }}</h1>

    <div class="text-l">{!! __('We Are a non-profit making organization<br />formed by a group of artists and educators coming from the field of <br />Arts and Performance') !!}</div>

    <div class="bg-red-800 text-white inline-block my-8 px-4 text-xl">{{ __('Our objectives') }}</div>

    <div class="grid grid-cols-3 gap-10 max-w-4xl m-auto">
        <div class="flex flex-col items-center gap-1">
            <img src="{{ asset('/images/icon-home-feature-1.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-20" />
            <span class="text-red-800 text-l">{{ __('Promote Art & Cultural') }}</span>
        </div>
        <div class="flex flex-col items-center gap-1">
            <img src="{{ asset('/images/icon-home-feature-2.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-20" />
            <span class="text-red-800 text-l">{{ __('Cultivate') }}</span>
        </div>
        <div class="flex flex-col items-center gap-1">
            <img src="{{ asset('/images/icon-home-feature-3.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-20" />
            <span class="text-red-800 text-l">{{ __('Promote Exchanges') }}</span>
        </div>
        <div class="flex flex-col items-center gap-1">
            <img src="{{ asset('/images/icon-home-feature-4.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-20" />
            <span class="text-red-800 text-l">{{ __('Art ideas and experiences') }}</span>
        </div>
        <div class="flex flex-col items-center gap-1">
            <img src="{{ asset('/images/icon-home-feature-5.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-20" />
            <span class="text-red-800 text-l">{{ __('Provide Training') }}</span>
        </div>
        <div class="flex flex-col items-center gap-1">
            <img src="{{ asset('/images/icon-home-feature-6.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-20" />
            <span class="text-red-800 text-l">{{ __('Exchange Platform') }}</span>
        </div>
    </div>
</div>