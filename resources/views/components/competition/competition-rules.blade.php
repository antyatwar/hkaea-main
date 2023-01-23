<div class="max-w-7xl mx-auto px-4 mt-10">
    <x-app.brush id="competition-rules">
        {{ __('Competition Rules') }}
    </x-app.brush>
</div>

<div class="max-w-7xl mx-auto px-4 mt-10">
    <div x-data="{ tab: 'painting-format' }">
        <div class="overflow-auto whitespace-nowrap no-scrollbar flex justify-start lg:justify-center items-center gap-4 lg:gap-8 mb-5 lg:mb-10">
            <a class="text-red-800 font-bold text-lg px-4 lg:px-8 py-2 border-2 border-red-800 rounded-full" :class="{ 'bg-red-800 text-white duration-300': tab === 'painting-format' }" @click.prevent="tab = 'painting-format'" href="#">{{ __('Painting Format') }}</a>
            <a class="text-red-800 font-bold text-lg px-4 lg:px-8 py-2 border-2 border-red-800 rounded-full" :class="{ 'bg-red-800 text-white duration-300': tab === 'poster' }" @click.prevent="tab = 'poster'" href="#">{{ __('Poster') }}</a>
            <a class="text-red-800 font-bold text-lg px-4 lg:px-8 py-2 border-2 border-red-800 rounded-full" :class="{ 'bg-red-800 text-white duration-300': tab === 'age-groups' }" @click.prevent="tab = 'age-groups'" href="#">{{ __('Age Groups') }}</a>
            <a class="text-red-800 font-bold text-lg px-4 lg:px-8 py-2 border-2 border-red-800 rounded-full" :class="{ 'bg-red-800 text-white duration-300': tab === 'judging-criteria' }" @click.prevent="tab = 'judging-criteria'" href="#">{{ __('Judging Criteria') }}</a>
            <a class="text-red-800 font-bold text-lg px-4 lg:px-8 py-2 border-2 border-red-800 rounded-full" :class="{ 'bg-red-800 text-white duration-300': tab === 'prizes' }" @click.prevent="tab = 'prizes'" href="#">{{ __('Prizes') }}</a>
        </div>

        <div x-show="tab === 'painting-format'">
            {!! $competition->painting_format !!}
        </div>

        <div x-show="tab === 'poster'">
            {!! $competition->poster !!}
        </div>

        <div x-show="tab === 'age-groups'">
            {!! $competition->age_groups !!}
        </div>

        <div x-show="tab === 'judging-criteria'">
            {!! $competition->judging_criteria !!}
        </div>

        <div x-show="tab === 'prizes'">
            {!! $competition->prizes !!}
        </div>
    </div>
</div>