<div class="bg-no-repeat text-white" style="background-image: url({{ asset('/images/bg-home-member.jpg') }});">
    <div class="max-w-4xl md:max-w-7xl m-auto py-20 px-4 text-xl md:flex grid gap-4 justify-between items-center">
        <div class="text-4xl">
            <div class="text-3xl">
                {{ __('Be our member') }}
            </div>
            <div class="text-xl">
                {{ __('Join HKAEA') }}
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4">
            <a href="{{ route('member') }}" class="bg-white text-black px-14 py-4 border-2 hover:bg-red-800 hover:text-white hover:border-2 hover:border-white duration-500">
                {{ __('Member Registration') }}
            </a>
            <a href="{{ route('member') }}" class="bg-white text-black px-14 py-4 border-2 hover:bg-red-800 hover:text-white hover:border-2 hover:border-white duration-500">
                {{ __('Member Benefits') }}
            </a>
        </div>
    </div>
</div>