<div class="bg-zinc-800 text-white">
    <div class="max-w-7xl lg:m-auto py-20 px-4 text-xl flex flex-col lg:flex-row justify-between lg:items-center bg-no-repeat bg-right" style="background-image: url({{ asset('/images/bg-footer.png') }});">
        <div>
            <div class="mb-4">
                <div class="text-2xl tracking-widest">香港藝術交流協會</div>
                <div class="text-sm">Hong Kong Art Exchange Association</div>
            </div>

            <div class="mb-4 text-sm">
                {!! __('The HKAEA was established in 2018<br /> It is a non-profit organization<br /> formed by a group of artists and educators<br /> coming from the field of arts and performance.') !!}
            </div>

            <div class="mb-4 text-xs">Copyright &copy; {{ now()->year }} {{ __(config('app.fullname')) }} All rights reserved.</div>
        </div>
        <div>
            <div class="flex justify-start items-center">
                <x-fas-location-dot class="w-6 h-6 text-white inline" />
                <a href="https://goo.gl/maps/NRbiCpqTK7SBjyFi6" target="_blank" class="text-sm pl-1 {{ app()->isLocale('hk') ? 'tracking-widest' : '' }} hover:text-red-800 duration-300">{{ __('Address') }}: {{ __('307A, 3/F, Block B, Chung Mei Centre, 15 Hing Yip Street, Kwun Tong') }}</a>
            </div>

            <hr class="my-2 mx-auto w-full bg-white opacity-40 rounded border-0 h-[1px]" />

            <div class="lg:flex justify-between items-center">
                <div class="flex lg:block">
                    <div class="flex justify-start items-center">
                        <x-fas-phone class="w-5 h-5 text-white inline" />
                        <span class="text-sm px-1 tracking-wider">{{ __('Phone') }}</span>
                    </div>
                    <div><a href="tel:+85223701078" class="text-sm hover:text-red-800 duration-300">+852 2370 1078</a></div>
                </div>
                <div class="flex lg:block">
                    <div class="flex justify-start items-center">
                        <x-fab-whatsapp class="w-6 h-6 text-white inline" />
                        <span class="text-sm px-1 tracking-wider">WhatsApp</span>
                    </div>
                    <div><a href="https://wa.me/85284813363" target="_blank" class="text-sm hover:text-red-800 duration-300">8481 3363</a></div>
                </div>
                <div class="flex lg:block">
                    <div class="flex justify-start items-center">
                        <x-fas-envelope class="w-5 h-5 text-white inline" />
                        <span class="text-sm px-1 tracking-wider">{{ __('Email') }}</span>
                    </div>
                    <div><a href="mailto:info@hkaea.hk" class="text-sm hover:text-red-800 duration-300">info@hkaea.hk</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="toTop" class="fixed bottom-0 right-0 z-40 cursor-pointer p-10 triangle">
    <x-fas-arrow-up class="text-white w-8 h-8 absolute bottom-2 right-2" />
</div>