<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Forms;

class Login extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $email = '';
    public $password = '';

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('email')
                ->label(__('Email'))
                ->email()
                ->default('basic@example.com')
                ->required(),
            Forms\Components\TextInput::make('password')
                ->label(__('Password'))
                ->password()
                ->default('password')
                ->required(),
        ];
    }

    public function login()
    {
        if (auth()->attempt($this->form->getState())) {
            session()->regenerate();

            return redirect()->route('account');
        }

        $this->addError('email', __('These credentials do not match our records.'));
        $this->addError('password', __('These credentials do not match our records.'));
    }

    public function render()
    {
        return view('livewire.login');
    }
}
