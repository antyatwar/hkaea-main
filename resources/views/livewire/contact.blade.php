<div>
    <x-app.hero>
        <img src="{{ asset('/images/hero-contact.jpg') }}" alt="{{ __(config('app.fullname')) }}" class="w-full" />
    </x-app.hero>

    <div class="max-w-7xl mx-auto px-4 mt-10">
        <h1 class="text-red-800 text-4xl">{{ __('Contact') }}</h1>
    </div>

    <div class="max-w-7xl mx-auto px-4 mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="col-span-2">
            <form wire:submit.prevent="submit">
                {{ $this->form }}

                <button type="submit" class="bg-black text-white mt-4 px-8 py-2 hover:bg-red-800 duration-300">
                    {{ __('Submit') }}
                </button>
            </form>
        </div>
        <div class="col-span-1 grid gap-4">
            <div>
                <div class="text-red-800">{{ __('Address') }}</div>
                <div><a class="hover:text-red-800 duration-300" href="https://goo.gl/maps/NRbiCpqTK7SBjyFi6" target="_blank">{{ __('307A, 3/F, Block B, Chung Mei Centre, 15 Hing Yip Street, Kwun Tong') }}</a></div>
            </div>
            <div>
                <div class="text-red-800">{{ __('Phone') }}</div>
                <div><a class="hover:text-red-800 duration-300" href="tel:+85223701078">+852 2370 1078</a></div>
            </div>
            <div>
                <div class="text-red-800">{{ __('Email') }}</div>
                <div><a class="hover:text-red-800 duration-300" href="mailto:info@hkaea.hk">info@hkaea.hk</a></div>
            </div>
            <div>
                <div class="text-red-800">{{ __('Office Hours') }}</div>
                <div>{{ __('Mon - Fri') }}: 10:00a.m. - 6:00p.m.</div>
                <div>{{ __('Lunch Hour') }}: 1:15 - 2:15p.m.</div>
            </div>
            <div class="flex gap-4 justify-between items-center">
                <div class="flex flex-col gap-1 justify-center items-center">
                    <div class="text-slate-600">Facebook</div>
                    <a href="https://www.facebook.com/HongKongArtExchangeAssociation/" target="_blank">
                        <img src="{{ asset('/images/qrcode-facebook.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full" />
                    </a>
                </div>
                <div class="flex flex-col gap-1 justify-center items-center">
                    <div class="text-slate-600">WhatsApp</div>
                    <a href="https://wa.me/85284813363" target="_blank">
                        <img src="{{ asset('/images/qrcode-whatsapp.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 pb-10 mt-10">
        <div class="text-red-800 text-l">{{ __('Location') }}</div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d922.7925830744296!2d114.22520120000001!3d22.309396999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404014478c30a19%3A0xcf8173fe31994b4e!2sChung%20Mei%20Centre!5e0!3m2!1sen!2shk!4v1670827954985!5m2!1sen!2shk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>