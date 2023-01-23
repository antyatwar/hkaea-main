<div>
    <x-app.hero>
        <img src="{{ asset('/images/hero-about.jpg') }}" alt="{{ __(config('app.fullname')) }}" class="w-full" />
    </x-app.hero>

    <div class="max-w-7xl mx-auto px-4 py-10">
        <h1 class="text-red-800 text-4xl">{{ __('About') }}</h1>
    </div>

    <div x-data="{ tab: 'association' }">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="border-b-4 border-red-800 pb-2 text-red-800">
                <a class="px-4 py-3" :class="{ 'bg-red-800 text-white': tab === 'association' }" @click.prevent="tab = 'association'" href="#">{{ __('HKAEA') }}</a>
                <a class="px-4 py-3" :class="{ 'bg-red-800 text-white': tab === 'members' }" @click.prevent="tab = 'members'" href="#">{{ __('Members') }}</a>
            </nav>
        </div>
        <div x-show="tab === 'association'">
            <x-about.association />
        </div>
        <div x-show="tab === 'members'">
            <x-about.members />
        </div>
    </div>
</div>