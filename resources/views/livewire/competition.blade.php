<div>
    <x-app.hero>
        <img src="{{ asset('/images/hero-competition.jpg') }}" alt="{{ __(config('app.fullname')) }}" class="w-full" />

        <div class="absolute inset-0 left-4 top-4 hidden md:block">
            <div class="inline-grid gap-2">
                <a href="#upload-artworks" class="inline-flex items-center gap-1 bg-white text-red-800 border-2 border-red-800 px-10 py-2 rounded-full group hover:bg-red-800">
                    <img src="{{ asset('/images/icon-anchor-upload.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 group-hover:hidden" />
                    <img src="{{ asset('/images/icon-anchor-upload-hover.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 hidden group-hover:inline" />
                    <span class="group-hover:text-white">{{ __('Upload Artworks') }}</span>
                </a>
                <a href="#competition-process" class="inline-flex items-center gap-1 bg-white text-red-800 border-2 border-red-800 px-10 py-2 rounded-full group hover:bg-red-800">
                    <img src="{{ asset('/images/icon-anchor-process.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 group-hover:hidden" />
                    <img src="{{ asset('/images/icon-anchor-process-hover.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 hidden group-hover:inline" />
                    <span class="group-hover:text-white">{{ __('Competition Process') }}</span>
                </a>
                <a href="#competition-rules" class="inline-flex items-center gap-1 bg-white text-red-800 border-2 border-red-800 px-10 py-2 rounded-full group hover:bg-red-800">
                    <img src="{{ asset('/images/icon-anchor-rules.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 group-hover:hidden" />
                    <img src="{{ asset('/images/icon-anchor-rules-hover.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 hidden group-hover:inline" />
                    <span class="group-hover:text-white">{{ __('Competition Rules') }}</span>
                </a>
                <a href="#participation" class="inline-flex items-center gap-1 bg-white text-red-800 border-2 border-red-800 px-10 py-2 rounded-full group hover:bg-red-800">
                    <img src="{{ asset('/images/icon-anchor-participation.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 group-hover:hidden" />
                    <img src="{{ asset('/images/icon-anchor-participation-hover.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 hidden group-hover:inline" />
                    <span class="group-hover:text-white">{{ __('Participation') }}</span>
                </a>
                <a href="#awards-ceremony" class="inline-flex items-center gap-1 bg-white text-red-800 border-2 border-red-800 px-10 py-2 rounded-full group hover:bg-red-800">
                    <img src="{{ asset('/images/icon-anchor-ceremony.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 group-hover:hidden" />
                    <img src="{{ asset('/images/icon-anchor-ceremony-hover.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 hidden group-hover:inline" />
                    <span class="group-hover:text-white">{{ __('Awards Ceremony') }}</span>
                </a>
                <a href="#previous-highlights" class="inline-flex items-center gap-1 bg-white text-red-800 border-2 border-red-800 px-10 py-2 rounded-full group hover:bg-red-800">
                    <img src="{{ asset('/images/icon-anchor-highlights.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 group-hover:hidden" />
                    <img src="{{ asset('/images/icon-anchor-highlights-hover.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 hidden group-hover:inline" />
                    <span class="group-hover:text-white">{{ __('Previous Highlights') }}</span>
                </a>
                <a href="#previous-artworks" class="inline-flex items-center gap-1 bg-white text-red-800 border-2 border-red-800 px-10 py-2 rounded-full group hover:bg-red-800">
                    <img src="{{ asset('/images/icon-anchor-artworks.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 group-hover:hidden" />
                    <img src="{{ asset('/images/icon-anchor-artworks-hover.png') }}" alt="{{ __(config('app.fullname')) }}" class="max-w-full w-7 hidden group-hover:inline" />
                    <span class="group-hover:text-white">{{ __('Previous Artworks') }}</span>
                </a>
            </div>
        </div>
    </x-app.hero>

    <x-competition.upload-artworks :competition="$competition" />

    <x-competition.hr />

    <x-competition.competition-process :competition="$competition" />

    <x-competition.hr />

    <x-competition.competition-rules :competition="$competition" />

    <x-competition.hr />

    <x-competition.participation :competition="$competition" />

    <x-competition.hr />

    <x-competition.awards-ceremony :competition="$competition" />

    <x-competition.hr />

    <x-competition.previous-highlights :competition="$competition" />

    <x-competition.hr />

    <x-competition.previous-artworks :competition="$competition" />
</div>