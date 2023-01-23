<div class="max-w-7xl mx-auto px-4 mt-10">
    <x-app.brush id="competition-process">
        {{ __('Competition Process') }}
    </x-app.brush>
</div>

<div class="max-w-7xl mx-auto px-4 my-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="grid gap-4">
        <img src="{{ asset('storage/' . $competition->process_image_1) }}" alt="{{ __(config('app.fullname')) }}" class="w-full lg:order-2" />
        <div class="text-red-800 text-center text-2xl font-semibold tracking-wide">
            {{ $competition->process_title_1 }}
            <br />
            {{ $competition->process_date_1->format('d/m/Y') }}
        </div>
    </div>
    <div class="grid gap-4">
        <img src="{{ asset('storage/' . $competition->process_image_2) }}" alt="{{ __(config('app.fullname')) }}" class="w-full" />
        <div class="text-red-800 text-center text-2xl font-semibold tracking-wide">
        {{ $competition->process_title_2 }}
            <br />
            {{ $competition->process_date_2->format('d/m/Y') }}
        </div>
    </div>
    <div class="grid gap-4">
        <img src="{{ asset('storage/' . $competition->process_image_3) }}" alt="{{ __(config('app.fullname')) }}" class="w-full lg:order-2" />
        <div class="text-red-800 text-center text-2xl font-semibold tracking-wide">
        {{ $competition->process_title_3 }}
            <br />
            {{ $competition->process_date_3->format('d/m/Y') }}
        </div>
    </div>
    <div class="grid gap-4">
        <img src="{{ asset('storage/' . $competition->process_image_4) }}" alt="{{ __(config('app.fullname')) }}" class="w-full" />
        <div class="text-red-800 text-center text-2xl font-semibold tracking-wide">
        {{ $competition->process_title_4 }}
            <br />
            {{ $competition->process_date_4->format('d/m/Y') }}
        </div>
    </div>
</div>