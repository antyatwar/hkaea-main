<div class="max-w-7xl mx-auto px-4 mt-10">
    <x-app.brush id="participation">
        {{ __('Participation') }}
    </x-app.brush>
</div>

<div class="max-w-7xl mx-auto px-4 mt-10">
    <div x-data="{ tab: 'payment-method' }">
        <div class="overflow-auto whitespace-nowrap no-scrollbar flex justify-start lg:justify-center items-center gap-4 lg:gap-8 mb-5 lg:mb-10">
            <a class="text-red-800 font-bold text-lg px-4 lg:px-8 py-2 border-2 border-red-800 rounded-full" :class="{ 'bg-red-800 text-white duration-300': tab === 'payment-method' }" @click.prevent="tab = 'payment-method'" href="#">{{ __('Payment Method') }}</a>
            <a class="text-red-800 font-bold text-lg px-4 lg:px-8 py-2 border-2 border-red-800 rounded-full" :class="{ 'bg-red-800 text-white duration-300': tab === 'individual-application' }" @click.prevent="tab = 'individual-application'" href="#">{{ __('Individual Application') }}</a>
            <a class="text-red-800 font-bold text-lg px-4 lg:px-8 py-2 border-2 border-red-800 rounded-full" :class="{ 'bg-red-800 text-white duration-300': tab === 'group-application' }" @click.prevent="tab = 'group-application'" href="#">{{ __('Group Application') }}</a>
            <a class="text-red-800 font-bold text-lg px-4 lg:px-8 py-2 border-2 border-red-800 rounded-full" :class="{ 'bg-red-800 text-white duration-300': tab === 'other-details' }" @click.prevent="tab = 'other-details'" href="#">{{ __('Other Details') }}</a>
            <a class="text-red-800 font-bold text-lg px-4 lg:px-8 py-2 border-2 border-red-800 rounded-full" :class="{ 'bg-red-800 text-white duration-300': tab === 'terms' }" @click.prevent="tab = 'terms'" href="#">{{ __('Terms') }}</a>
        </div>

        <div x-show="tab === 'payment-method'">
            {!! $competition->payment_method !!}
        </div>

        <div x-show="tab === 'individual-application'">
            {!! $competition->individual_application !!}
        </div>

        <div x-show="tab === 'group-application'">
            {!! $competition->group_application !!}
        </div>

        <div x-show="tab === 'other-details'">
            {!! $competition->other_details !!}
        </div>

        <div x-show="tab === 'terms'">
            {!! $competition->terms !!}
        </div>
    </div>
</div>