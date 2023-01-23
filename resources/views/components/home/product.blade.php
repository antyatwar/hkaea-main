<div class="bg-slate-100 py-10">
    <div class="px-4 pb-10 flex flex-col justify-center">
        <div class="flex justify-center items-center mb-4">
            <x-fas-caret-right class="h-7 w-7 text-red-800" />
            <h1 class="text-4xl px-7">{{ __('New Products') }}</h1>
            <x-fas-caret-left class="h-7 w-7 text-red-800" />
        </div>

        <div class="flex justify-center items-center">
            <a href="#" class="font-semibold text-xl pr-2 hover:text-red-800">{{ __('More') }}</a>
            <div class="h-2 w-10 bg-red-800"></div>
        </div>
    </div>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @for($i = 0; $i < 10; $i++)
            <div class="group relative swiper-slide">
                <img src="{{ asset('/images/demo-product.jpg') }}" alt="{{ __(config('app.fullname')) }}" class="w-full object-cover" />
                <div class="absolute top-0 left-0 w-full h-0 flex flex-col justify-center items-center bg-red-800 opacity-0 group-hover:h-full group-hover:opacity-90 duration-500">
                    <h1 class="text-2xl text-white">{{ __('溫莎牛頓ARTISTS油彩竹盒套裝') }}</h1>
                    <p class="text-2xl mt-7 text-white">$1,000</p>
                    <a href="#" class="mt-5 px-8 py-2 rounded-full bg-white text-red-800 opacity-70 border-2 group hover:opacity-100 inline-flex items-center">
                        <x-fas-basket-shopping class="text-red-800 w-5 h-5 mr-4 inline" />
                        <span>{{ __('Add to cart') }}</span>
                    </a>
                </div>
            </div>
            @endfor
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>