<div>
    <x-app.hero>
        <img src="{{ asset('/images/hero-member.jpg') }}" alt="{{ __(config('app.fullname')) }}" class="w-full" />
    </x-app.hero>

    <div class="max-w-7xl mx-auto px-4 my-10">
        <h1 class="text-red-800 text-4xl pb-4 inline-block">{{ __('Become a Member') }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-7">
            <div class="bg-slate-300 p-4 rounded-md flex flex-col justify-between">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-bold lg:text-2xl">{{ __('Basic Member') }}</h1>
                    <h2 class="text-red-800 font-semibold">{{ __('Membership Fee') }}: {{ __('Free') }}</h2>
                </div>
                <div class="flex flex-col justify-between bg-white p-4 my-4 rounded-md md:h-[28rem]">
                    <div>
                        <p>{{ __("Enjoy members' benefits and discounts") }}</p>
                        <p>{{ __('Right to take part in HKAEA activities, events and competitions') }}</p>
                    </div>
                    <div>
                        <p class="mt-4">
                            <x-fas-circle class="text-red-800 w-2 h-2 inline mr-1" />{{ __('Download registration form') }}
                        </p>
                        <a href="{{ route('register', ['role' => 'basic']) }}" class="bg-red-800 text-white px-4 py-1 rounded-md mt-4 inline-block border-2 border-red-800 hover:text-red-800 hover:bg-white">{{ __('Online Registration') }}</a>
                    </div>
                </div>
            </div>
            <div class="bg-slate-300 p-4 rounded-md flex flex-col justify-between">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-bold lg:text-2xl">{{ __('Individual Member') }}</h1>
                    <h2 class="text-red-800 font-semibold">{{ __('Membership Fee') }}: {{ __('HK$200/year') }}</h2>
                </div>
                <div class="flex flex-col justify-between bg-white p-4 my-4 rounded-md md:h-[28rem]">
                    <div>
                        <p>{{ __("Enjoy members' benefits and discounts") }}</p>
                        <p>{{ __('Right to take part in HKAEA activities, events and competitions') }}</p>
                    </div>
                    <div>
                        <p class="mt-4">
                            <x-fas-circle class="text-red-800 w-2 h-2 inline mr-1" />{{ __('Download registration form') }}
                        </p>
                        <a href="{{ route('register', ['role' => 'individual']) }}" class="bg-red-800 text-white px-4 py-1 rounded-md mt-4 inline-block border-2 border-red-800 hover:text-red-800 hover:bg-white">{{ __('Online Registration') }}</a>
                    </div>
                </div>
            </div>
            <div class="bg-slate-300 p-4 rounded-md flex flex-col justify-between">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-bold lg:text-2xl">{{ __('School or Non-Profit Making Organization Member') }}</h1>
                    <h2 class="text-red-800 font-semibold">{{ __('Membership Fee') }}: {{ __('HK$500/year') }}</h2>
                </div>
                <div class="flex flex-col justify-between bg-white p-4 my-4 rounded-md md:h-[28rem]">
                    <div>
                        <p>{{ __("Enjoy members' benefits and discounts") }}</p>
                        <p>{{ __('Right to take part in HKAEA activities, events and competitions') }}</p>
                    </div>
                    <div>
                        <p class="mt-4">
                            <x-fas-circle class="text-red-800 w-2 h-2 inline mr-1" />{{ __('Download registration form') }}
                        </p>
                        <a href="{{ route('register', ['role' => 'school-npo']) }}" class="bg-red-800 text-white px-4 py-1 rounded-md mt-4 inline-block border-2 border-red-800 hover:text-red-800 hover:bg-white">{{ __('Online Registration') }}</a>
                    </div>
                </div>
            </div>
            <div class="bg-slate-300 p-4 rounded-md flex flex-col justify-between">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-bold lg:text-2xl">{{ __('Organization Member') }}</h1>
                    <h2 class="text-red-800 font-semibold">{{ __('Membership Fee') }}: {{ __('HK$1,000/year') }}</h2>
                </div>
                <div class="flex flex-col justify-between bg-white p-4 my-4 rounded-md md:h-[28rem]">
                    <div>
                        <p>{{ __("Enjoy members' benefits and discounts") }}</p>
                        <p>{{ __('Right to take part in HKAEA activities, events and competitions') }}</p>
                    </div>
                    <div>
                        <p class="mt-4">
                            <x-fas-circle class="text-red-800 w-2 h-2 inline mr-1" />{{ __('Download registration form') }}
                        </p>
                        <a href="{{ route('register', ['role' => 'organization']) }}" class="bg-red-800 text-white px-4 py-1 rounded-md mt-4 inline-block border-2 border-red-800 hover:text-red-800 hover:bg-white">{{ __('Online Registration') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>