<div>
    <x-app.hero>
        <img src="{{ asset('/images/hero-home.jpg') }}" alt="{{ __(config('app.fullname')) }}" class="w-full" />
    </x-app.hero>

    <x-home.news :featured_posts="$featured_posts" :general_posts="$general_posts" />

    <x-home.feature />
    <x-home.product />
    <x-home.member />
</div>