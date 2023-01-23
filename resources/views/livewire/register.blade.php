<div>
    <div class="max-w-7xl mx-auto my-10 px-4">
        <h1 class="text-4xl text-red-800 border-b-4 border-red-800 py-4 mb-10">
            {{ __($role->name) }}
        </h1>

        <form wire:submit.prevent="submit">
            {{ $this->form }}

            <button type="submit" class="bg-red-800 text-white border-2 border-red-800 px-8 py-2 mt-8 hover:bg-white hover:text-red-800">
                {{ __('Submit') }}
            </button>
        </form>

        <div class="mt-8">
            <a href="{{ route('login') }}" class="text-red-800 border-b-2 border-red-800">
                {{ __('Login') }}
            </a>
        </div>
    </div>
</div>