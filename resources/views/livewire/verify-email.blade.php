<div>
    <div class="max-w-7xl mx-auto px-4 py-10">
        <div class="mb-4">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <button type="submit" class="bg-white text-red-800 border-2 border-red-800 px-4 py-2 hover:bg-red-800 hover:text-white">
                        {{ __('Resend Verification Email') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>