<?php

namespace App\Http\Livewire;

use Filament\Forms;
use Livewire\Component;
use App\Models\User;

class Contact extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $firstName = '';
    public $lastName = '';
    public $email = '';
    public $phone = '';
    public $subject = '';
    public $message = '';

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Grid::make(2)->schema([
                Forms\Components\TextInput::make('firstName')
                    ->label(__('First Name'))
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('lastName')
                    ->label(__('Last Name'))
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label(__('Email'))
                    ->maxLength(255)
                    ->type('email')
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->label(__('Phone'))
                    ->maxLength(255)
                    ->type('tel')
                    ->required(),
                Forms\Components\TextInput::make('subject')
                    ->label(__('Subject'))
                    ->maxLength(255)
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('message')
                    ->label(__('Message'))
                    ->maxLength(65535)
                    ->required()
                    ->columnSpanFull(),
            ]),
        ];
    }

    public function submit(): void
    {
        dd($this->form->getState());
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
