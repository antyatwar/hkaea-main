<?php

namespace App\Http\Livewire;

use App\Models\Artwork;
use App\Models\Competition;
use App\Models\Participant;
use App\Models\User;
use Filament\Forms;
use Livewire\Component;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

class Application extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public Competition $competition;
    public $title;

    public function mount(): void
    {
        $this->title = auth()->user()->isGroup() ? __('Group Application') : __('Individual Application');

        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        if (auth()->user()->isGroup()) {
            return $this->getOrganizationForm();
        } else {
            return $this->getIndividualForm();
        }
    }

    protected function getIndividualForm(): array
    {
        return [
            Forms\Components\Hidden::make('user_id')
                ->label('user_id')
                ->default(auth()->user()->id)
                ->disabled()
                ->required(),
            Forms\Components\Hidden::make('participantable_type')
                ->label('participantable_type')
                ->default(auth()->user()->isGroup() ? 'App\Models\Organization' : 'App\Models\Individual')
                ->disabled()
                ->required(),
            Forms\Components\Hidden::make('participantable_id')
                ->label('participantable_id')
                ->default(auth()->user()->isGroup() ? auth()->user()->organization?->id : auth()->user()->individual?->id)
                ->disabled()
                ->required(),
            Forms\Components\Grid::make()->schema([
                Forms\Components\TextInput::make('chinese_name')
                    ->label(__('Chinese Name'))
                    ->default(auth()->user()->individual->first_name_cn . ' ' . auth()->user()->individual->last_name_cn)
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('english_name')
                    ->label(__('English Name'))
                    ->default(auth()->user()->individual->first_name_en . ' ' . auth()->user()->individual->last_name_en)
                    ->maxLength(255)
                    ->required(),
            ]),
            Forms\Components\Grid::make()->schema([
                Forms\Components\Radio::make('gender_id')
                    ->label(__('Gender'))
                    ->options([
                        1 => __('Male'),
                        2 => __('Female'),
                    ])
                    ->default(auth()->user()->individual->gender_id)
                    ->inline()
                    ->required(),
            ]),
            Forms\Components\Grid::make(3)->schema([
                Forms\Components\DatePicker::make('birth_date')
                    ->label(__('Birth Date'))
                    ->default(auth()->user()->individual->birth_date)
                    ->minDate(now()->subYears(100))
                    ->maxDate(now())
                    ->required(),
            ]),
            Forms\Components\Grid::make()->schema([
                Forms\Components\TextInput::make('parent_phone')
                    ->label(__('Parent Phone'))
                    ->tel()
                    ->default(auth()->user()->participant->parent_phone ?? null)
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('parent_email')
                    ->label(__('Parent Email'))
                    ->email()
                    ->default(auth()->user()->participant->parent_email ?? null)
                    ->maxLength(255)
                    ->required(),
            ]),
            Forms\Components\Repeater::make('artworks')
                ->label(__('Artworks'))
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label(__('Artwork Title'))
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextArea::make('description')
                        ->label(__('Artwork Description'))
                        ->rows(4)
                        ->maxLength(65535)
                        ->required(),
                    Forms\Components\FileUpload::make('image')
                        ->label(__('Artwork Image'))
                        ->image()
                        ->directory('artworks')
                        ->maxSize(10240)
                        ->required(),
                ])
                ->createItemButtonLabel(__('Add Artwork')),
        ];
    }

    protected function getOrganizationForm(): array
    {
        return [
            Forms\Components\Repeater::make('participants')
                ->label(__('Participants'))
                ->schema([
                    Forms\Components\Grid::make(3)
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label(__('Name'))
                                ->default('John Doe')
                                ->maxLength(255)
                                ->required(),
                            Forms\Components\TextInput::make('email')
                                ->label(__('Email'))
                                ->default('org_a@example.com')
                                ->maxLength(255)
                                ->unique(User::class)
                                ->required(),
                            Forms\Components\TextInput::make('password')
                                ->label(__('Password'))
                                ->default('password')
                                ->password()
                                ->minLength(8)
                                ->required()
                                ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                        ]),
                    Forms\Components\Grid::make()->schema([
                        Forms\Components\TextInput::make('chinese_name')
                            ->label(__('Chinese Name'))
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('english_name')
                            ->label(__('English Name'))
                            ->maxLength(255)
                            ->required(),
                    ]),
                    Forms\Components\Grid::make()->schema([
                        Forms\Components\Radio::make('gender_id')
                            ->label(__('Gender'))
                            ->options([
                                1 => __('Male'),
                                2 => __('Female'),
                            ])
                            ->inline()
                            ->required(),
                    ]),
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\DatePicker::make('birth_date')
                            ->label(__('Birth Date'))
                            ->minDate(now()->subYears(100))
                            ->maxDate(now())
                            ->required(),
                    ]),
                    Forms\Components\Hidden::make('participantable_type')
                        ->label('participantable_type')
                        ->default(auth()->user()->isGroup() ? 'App\Models\Organization' : 'App\Models\Individual')
                        ->disabled()
                        ->required(),
                    Forms\Components\Hidden::make('participantable_id')
                        ->label('participantable_id')
                        ->default(auth()->user()->isGroup() ? auth()->user()->organization?->id : auth()->user()->individual?->id)
                        ->disabled()
                        ->required(),
                    Forms\Components\Repeater::make('artworks')
                        ->label(__('Artworks'))
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->label(__('Artwork Title'))
                                ->maxLength(255)
                                ->required(),
                            Forms\Components\TextArea::make('description')
                                ->label(__('Artwork Description'))
                                ->rows(4)
                                ->maxLength(65535)
                                ->required(),
                            Forms\Components\FileUpload::make('image')
                                ->label(__('Artwork Image'))
                                ->image()
                                ->directory('artworks')
                                ->maxSize(10240)
                                ->required(),
                        ])
                        ->createItemButtonLabel(__('Add Artwork')),
                ]),
        ];
    }

    protected function getFormModel(): string
    {
        return Participant::class;
    }

    public function submit()
    {
        if (auth()->user()->isGroup()) {
            collect($this->form->getState()['participants'])->map(function ($participant) {
                $user = User::create([
                    'name' => $participant['name'],
                    'email' => $participant['email'],
                    'password' => $participant['password'],
                ]);

                $participantCreated = $user->participant()->create([
                    'chinese_name' => $participant['chinese_name'],
                    'english_name' => $participant['english_name'],
                    'gender_id' => $participant['gender_id'],
                    'birth_date' => $participant['birth_date'],
                    'participantable_type' => $participant['participantable_type'],
                    'participantable_id' => $participant['participantable_id'],
                ]);

                $participantCreated->competitions()->attach($this->competition);

                collect($participant['artworks'])->map(function ($artwork) use ($participantCreated) {
                    Artwork::create([
                        'participant_id' => $participantCreated->id,
                        'competition_id' => $this->competition->id,
                        'title' => $artwork['title'],
                        'description' => $artwork['description'],
                        'image' => $artwork['image'],
                    ]);
                });
            });

            Notification::make()
                ->title(__('Application successfully'))
                ->success()
                ->send();

            return redirect()->route('competition', $this->competition);
        } else {
            if ($this->competition->participants()->where('user_id', auth()->user()->id)->exists()) {
                Notification::make()
                    ->title(__('You have already applied for this competition'))
                    ->warning()
                    ->send();

                return redirect()->back();
            }

            $participant = Participant::create($this->form->getState());

            $participant->competitions()->attach($this->competition);

            collect($this->form->getState()['artworks'])->map(function ($artwork) use ($participant) {
                Artwork::create([
                    'participant_id' => $participant->id,
                    'competition_id' => $this->competition->id,
                    'title' => $artwork['title'],
                    'description' => $artwork['description'],
                    'image' => $artwork['image'],
                ]);
            });

            Notification::make()
                ->title(__('Application successfully'))
                ->success()
                ->send();

            return redirect()->route('competition', $this->competition);
        }
    }

    public function render()
    {
        return view('livewire.application');
    }
}
