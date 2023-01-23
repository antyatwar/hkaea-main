<div>
    <div class="max-w-lg mx-auto my-20 px-4">
        <form wire:submit.prevent="login">
            {{ $this->form }}

            <button type="submit" class="bg-red-800 text-white border-2 border-red-800 px-8 py-2 mt-8 hover:bg-white hover:text-red-800">
                {{ __('Login') }}
            </button>
        </form>

        <div class="mt-8">
            <a href="{{ route('member') }}" class="text-red-800 border-b-2 border-red-800">
                {{ __('Register') }}
            </a>
        </div>
    </div>
</div>