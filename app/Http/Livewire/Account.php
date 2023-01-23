<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Closure;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Account extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public function mount(): void
    {
        $this->form->fill([
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'password' => 'password',
            'passwordConfirmation' => 'password',
        ]);
    }

    protected function getFormSchema(): array
    {
        switch (auth()->user()->roles->first()->slug) {
            case 'basic':
            case 'individual':
                return $this->getIndividualForm();
            case 'school-npo':
            case 'organization':
                return $this->getOrganizationForm();
            default:
                return [];
                // return redirect()->route('home');
        }
    }

    protected function getBasicForm(): array
    {
        return [
            Forms\Components\Fieldset::make(__('Basic Information'))
                ->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('Name'))
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->label(__('Email'))
                            ->email()
                            ->maxLength(255)
                            ->required()
                            ->unique(ignorable: auth()->user()),
                    ]),
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('password')
                            ->label(__('Password'))
                            ->password()
                            ->minLength(8)
                            ->required()
                            ->same('passwordConfirmation')
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                        Forms\Components\TextInput::make('passwordConfirmation')
                            ->label(__('Password Confirmation'))
                            ->password()
                            ->minLength(8)
                            ->required()
                            ->dehydrated(false),
                    ]),
                ]),
        ];
    }

    protected function getIndividualForm(): array
    {
        $competitionForm = [
            Forms\Components\Fieldset::make(__('Competition Information'))
                ->relationship('participant')
                ->schema([
                    Forms\Components\Tabs::make('Competition Information')
                        ->tabs([
                            Forms\Components\Tabs\Tab::make('Participant')
                                ->schema([
                                    Forms\Components\Hidden::make('user_id')
                                        ->label('user_id')
                                        ->disabled()
                                        ->required(),
                                    Forms\Components\Hidden::make('participantable_type')
                                        ->label('participantable_type')
                                        ->disabled()
                                        ->required(),
                                    Forms\Components\Hidden::make('participantable_id')
                                        ->label('participantable_id')
                                        ->disabled()
                                        ->required(),
                                    Forms\Components\Grid::make()->schema([
                                        Forms\Components\TextInput::make('chinese_name')
                                            ->label(__('Chinese Name'))
                                            ->maxLength(255)
                                            ->disabled(),
                                        Forms\Components\TextInput::make('english_name')
                                            ->label(__('English Name'))
                                            ->maxLength(255)
                                            ->disabled(),
                                    ]),
                                    Forms\Components\Grid::make()->schema([
                                        Forms\Components\Radio::make('gender_id')
                                            ->label(__('Gender'))
                                            ->options([
                                                1 => __('Male'),
                                                2 => __('Female'),
                                            ])
                                            ->inline()
                                            ->disabled(),
                                    ]),
                                    Forms\Components\Grid::make(3)->schema([
                                        Forms\Components\DatePicker::make('birth_date')
                                            ->label(__('Birth Date'))
                                            ->minDate(now()->subYears(100))
                                            ->maxDate(now())
                                            ->disabled(),
                                    ]),
                                    Forms\Components\Grid::make()->schema([
                                        Forms\Components\TextInput::make('parent_phone')
                                            ->label(__('Parent Phone'))
                                            ->tel()
                                            ->maxLength(255)
                                            ->disabled(),
                                        Forms\Components\TextInput::make('parent_email')
                                            ->label(__('Parent Email'))
                                            ->email()
                                            ->maxLength(255)
                                            ->disabled(),
                                    ]),
                                ]),
                            Forms\Components\Tabs\Tab::make('Competitions')
                                ->schema([
                                    Forms\Components\Repeater::make('competitions')
                                        ->relationship()
                                        ->label(__('Competitions'))
                                        ->disableLabel()
                                        ->disabled()
                                        ->schema([
                                            Forms\Components\TextInput::make('title.en')
                                                ->label(__('Competition Title'))
                                                ->maxLength(255),
                                        ])
                                        ->disableItemCreation()
                                        ->disableItemDeletion()
                                        ->disableItemMovement()
                                        ->columnSpanFull(),
                                ]),
                            Forms\Components\Tabs\Tab::make('Artworks')
                                ->schema([
                                    Forms\Components\Repeater::make('artworks')
                                        ->relationship()
                                        ->label(__('Artworks'))
                                        ->disabled()
                                        ->schema([
                                            Forms\Components\TextInput::make('title')
                                                ->label(__('Artwork Title'))
                                                ->maxLength(255),
                                            Forms\Components\TextArea::make('description')
                                                ->label(__('Artwork Description'))
                                                ->rows(4)
                                                ->maxLength(65535),
                                            Forms\Components\FileUpload::make('image')
                                                ->label(__('Artwork Image'))
                                                ->image()
                                                ->enableOpen()
                                                ->enableDownload()
                                                ->directory('artworks')
                                                ->maxSize(10240),
                                        ])
                                        ->disableItemCreation()
                                        ->disableItemDeletion()
                                        ->disableItemMovement()
                                        ->columnSpanFull(),
                                ]),
                        ])
                        ->columnSpanFull(),
                ]),
        ];

        $individualForm = [
            Forms\Components\Fieldset::make(__('Member Information'))
                ->relationship('individual')
                ->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('first_name_cn')
                            ->label(__('First Name (Chinese)'))
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('last_name_cn')
                            ->label(__('Last Name (Chinese)'))
                            ->maxLength(255)
                            ->required(),
                    ]),
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('first_name_en')
                            ->label(__('First Name (English)'))
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('last_name_en')
                            ->label(__('Last Name (English)'))
                            ->maxLength(255)
                            ->required(),
                    ]),
                    Forms\Components\Grid::make(3)->schema([
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
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('address')
                            ->label(__('Address'))
                            ->maxLength(255)
                            ->columnSpan(2),
                    ]),
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\Select::make('country_id')
                            ->label(__('Country'))
                            ->relationship('country', 'name')
                    ]),
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\FileUpload::make('documents')
                            ->label(__('Documents'))
                            ->multiple()
                            ->imagePreviewHeight(100)
                            ->acceptedFileTypes(['application/pdf', 'image/*'])
                            ->enableOpen()
                            ->enableDownload()
                            ->directory('documents')
                            ->maxSize(1024),
                    ]),
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('phone')
                            ->label(__('Phone'))
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('fax')
                            ->label(__('Fax'))
                            ->maxLength(255),
                    ]),
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('occupation')
                            ->label(__('Occupation'))
                            ->maxLength(255),
                        Forms\Components\Select::make('qualification_id')
                            ->label(__('Qualification'))
                            ->relationship('qualification', 'name', fn ($query) => $query->orderBy('id'))
                            ->reactive(),
                        Forms\Components\TextInput::make('qualification_other')
                            ->label(__('Qualification Other'))
                            ->maxLength(255)
                            ->visible(fn (Closure $get): Bool => $get('qualification_id') == 10),
                    ]),
                ]),
            Forms\Components\Fieldset::make(__('Other Information'))
                ->schema([
                    Forms\Components\Grid::make(3)
                        ->schema([
                            Forms\Components\CheckboxList::make('newsletters')
                                ->label(__('Newsletters'))
                                ->relationship('newsletters', 'name', fn ($query) => $query->orderBy('id'))
                                ->columnSpanFull()
                                ->columns(3)
                                ->reactive(),
                        ]),
                    Forms\Components\Grid::make(3)
                        ->relationship('individual')
                        ->schema([
                            Forms\Components\TextInput::make('newsletter_other')
                                ->label(__('Newsletter Other'))
                                ->maxLength(255)
                                ->visible(fn (Closure $get): Bool => in_array(18, $get('../newsletters'))),
                        ]),
                    Forms\Components\Grid::make(3)
                        ->relationship('individual')
                        ->schema([
                            Forms\Components\Radio::make('is_volunteer')
                                ->label(__('Volunteer'))
                                ->options([
                                    1 => __('Yes'),
                                    0 => __('No'),
                                ])
                                ->inline(),
                        ]),
                    Forms\Components\Grid::make(3)
                        ->relationship('individual')
                        ->schema([
                            Forms\Components\Select::make('survey_id')
                                ->label(__('Survey'))
                                ->relationship('survey', 'name', fn ($query) => $query->orderBy('id'))
                                ->reactive(),
                            Forms\Components\TextInput::make('survey_other')
                                ->label(__('Survey Other'))
                                ->maxLength(255)
                                ->visible(fn (Closure $get): Bool => $get('survey_id') == 7),
                        ]),
                    Forms\Components\Grid::make()
                        ->relationship('individual')
                        ->schema([
                            Forms\Components\TextInput::make('comment')
                                ->label(__('Comment'))
                                ->maxLength(255)
                                ->columnSpanFull(),
                        ]),
                ]),
        ];

        return array_merge($this->getBasicForm(), $competitionForm, $individualForm);
    }

    protected function getOrganizationForm(): array
    {
        $competitionForm = [
            Forms\Components\Fieldset::make(__('Competition Information'))
                ->relationship('organization')
                ->schema([
                    Forms\Components\Repeater::make('participants')
                        ->relationship('participants')
                        ->schema([
                            Forms\Components\Grid::make(4)->schema([
                                Forms\Components\TextInput::make('chinese_name')
                                    ->label(__('Chinese Name'))
                                    ->maxLength(255)
                                    ->disabled(),
                                Forms\Components\TextInput::make('english_name')
                                    ->label(__('English Name'))
                                    ->maxLength(255)
                                    ->disabled(),
                                Forms\Components\Radio::make('gender_id')
                                    ->label(__('Gender'))
                                    ->options([
                                        1 => __('Male'),
                                        2 => __('Female'),
                                    ])
                                    ->inline()
                                    ->disabled(),
                                Forms\Components\DatePicker::make('birth_date')
                                    ->label(__('Birth Date'))
                                    ->minDate(now()->subYears(100))
                                    ->maxDate(now())
                                    ->disabled(),
                            ]),
                        ])
                        ->columnSpanFull(),
                    // Forms\Components\Tabs::make('Competition Information')
                    //     ->tabs([
                    //         Forms\Components\Tabs\Tab::make('Participant')
                    //             ->schema([
                    //                 Forms\Components\Hidden::make('user_id')
                    //                     ->label('user_id')
                    //                     ->disabled()
                    //                     ->required(),
                    //                 Forms\Components\Hidden::make('participantable_type')
                    //                     ->label('participantable_type')
                    //                     ->disabled()
                    //                     ->required(),
                    //                 Forms\Components\Hidden::make('participantable_id')
                    //                     ->label('participantable_id')
                    //                     ->disabled()
                    //                     ->required(),
                    //                 Forms\Components\Grid::make()->schema([
                    //                     Forms\Components\TextInput::make('chinese_name')
                    //                         ->label(__('Chinese Name'))
                    //                         ->maxLength(255)
                    //                         ->disabled(),
                    //                     Forms\Components\TextInput::make('english_name')
                    //                         ->label(__('English Name'))
                    //                         ->maxLength(255)
                    //                         ->disabled(),
                    //                 ]),
                    //                 Forms\Components\Grid::make()->schema([
                    //                     Forms\Components\Radio::make('gender_id')
                    //                         ->label(__('Gender'))
                    //                         ->options([
                    //                             1 => __('Male'),
                    //                             2 => __('Female'),
                    //                         ])
                    //                         ->inline()
                    //                         ->disabled(),
                    //                 ]),
                    //                 Forms\Components\Grid::make(3)->schema([
                    //                     Forms\Components\DatePicker::make('birth_date')
                    //                         ->label(__('Birth Date'))
                    //                         ->minDate(now()->subYears(100))
                    //                         ->maxDate(now())
                    //                         ->disabled(),
                    //                 ]),
                    //                 Forms\Components\Grid::make()->schema([
                    //                     Forms\Components\TextInput::make('parent_phone')
                    //                         ->label(__('Parent Phone'))
                    //                         ->tel()
                    //                         ->maxLength(255)
                    //                         ->disabled(),
                    //                     Forms\Components\TextInput::make('parent_email')
                    //                         ->label(__('Parent Email'))
                    //                         ->email()
                    //                         ->maxLength(255)
                    //                         ->disabled(),
                    //                 ]),
                    //             ]),
                    //         Forms\Components\Tabs\Tab::make('Competitions')
                    //             ->schema([
                    //                 Forms\Components\Repeater::make('competitions')
                    //                     ->relationship()
                    //                     ->label(__('Competitions'))
                    //                     ->disableLabel()
                    //                     ->disabled()
                    //                     ->schema([
                    //                         Forms\Components\TextInput::make('title.en')
                    //                             ->label(__('Competition Title'))
                    //                             ->maxLength(255),
                    //                     ])
                    //                     ->disableItemCreation()
                    //                     ->disableItemDeletion()
                    //                     ->disableItemMovement()
                    //                     ->columnSpanFull(),
                    //             ]),
                    //         Forms\Components\Tabs\Tab::make('Artworks')
                    //             ->schema([
                    //                 Forms\Components\Repeater::make('artworks')
                    //                     ->relationship()
                    //                     ->label(__('Artworks'))
                    //                     ->disabled()
                    //                     ->schema([
                    //                         Forms\Components\TextInput::make('title')
                    //                             ->label(__('Artwork Title'))
                    //                             ->maxLength(255),
                    //                         Forms\Components\TextArea::make('description')
                    //                             ->label(__('Artwork Description'))
                    //                             ->rows(4)
                    //                             ->maxLength(65535),
                    //                         Forms\Components\FileUpload::make('image')
                    //                             ->label(__('Artwork Image'))
                    //                             ->image()
                    //                             ->enableOpen()
                    //                             ->enableDownload()
                    //                             ->directory('artworks')
                    //                             ->maxSize(10240),
                    //                     ])
                    //                     ->disableItemCreation()
                    //                     ->disableItemDeletion()
                    //                     ->disableItemMovement()
                    //                     ->columnSpanFull(),
                    //             ]),
                    //     ])
                    //     ->columnSpanFull(),
                ]),
        ];

        $organizationForm = [
            Forms\Components\Fieldset::make(__('Member Information'))
                ->relationship('organization')
                ->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('org_name_en')
                            ->label(__('Organization Name (English)'))
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('org_name_cn')
                            ->label(__('Organization Name (Chinese)'))
                            ->maxLength(255)
                            ->required(),
                    ]),
                    Forms\Components\Card::make()->schema([
                        Forms\Components\Grid::make(3)->schema([
                            Forms\Components\TextInput::make('org_pic_name_en')
                                ->label(__('Responsible Person for the Organization (English)'))
                                ->maxLength(255)
                                ->required(),
                            Forms\Components\TextInput::make('org_pic_name_cn')
                                ->label(__('Responsible Person for the Organization (Chinese)'))
                                ->maxLength(255)
                                ->required(),
                        ]),
                        Forms\Components\Grid::make(3)->schema([
                            Forms\Components\TextInput::make('org_pic_title')
                                ->label(__('Title of the Responsible Person'))
                                ->maxLength(255)
                                ->required(),
                            Forms\Components\TextInput::make('org_pic_email')
                                ->label(__('Email of the Responsible Person'))
                                ->email()
                                ->maxLength(255)
                                ->required(),
                        ]),
                        Forms\Components\Grid::make(3)->schema([
                            Forms\Components\TextInput::make('org_pic_phone')
                                ->label(__('Phone of the Responsible Person'))
                                ->tel()
                                ->maxLength(255)
                                ->required(),
                            Forms\Components\TextInput::make('org_pic_whatsapp')
                                ->label(__('WhatsApp of the Responsible Person'))
                                ->tel()
                                ->maxLength(255)
                                ->required(),
                        ]),
                    ]),
                    Forms\Components\Grid::make()->schema([
                        Forms\Components\Toggle::make('is_org_cp_same_as_org_pic')
                            ->label(__('Is the Contact Person the same as the Responsible Person?'))
                            ->default(auth()->user()->organization->is_org_cp_same_as_org_pic)
                            ->reactive()
                            ->afterStateUpdated(
                                function (Closure $get, Closure $set, $state) {
                                    if ($state) {
                                        $set('org_cp_name_en', $get('org_pic_name_en'));
                                        $set('org_cp_name_cn', $get('org_pic_name_cn'));
                                        $set('org_cp_title', $get('org_pic_title'));
                                        $set('org_cp_email', $get('org_pic_email'));
                                        $set('org_cp_phone', $get('org_pic_phone'));
                                        $set('org_cp_whatsapp', $get('org_pic_whatsapp'));
                                    } else {
                                        $set('org_cp_name_en', auth()->user()->organization->org_cp_name_en);
                                        $set('org_cp_name_cn', auth()->user()->organization->org_cp_name_cn);
                                        $set('org_cp_title', auth()->user()->organization->org_cp_title);
                                        $set('org_cp_email', auth()->user()->organization->org_cp_email);
                                        $set('org_cp_phone', auth()->user()->organization->org_cp_phone);
                                        $set('org_cp_whatsapp', auth()->user()->organization->org_cp_whatsapp);
                                    }
                                }
                            ),
                    ]),
                    Forms\Components\Card::make()
                        ->disabled(fn (Closure $get): Bool => $get('is_org_cp_same_as_org_pic'))
                        ->schema([
                            Forms\Components\Grid::make(3)->schema([
                                Forms\Components\TextInput::make('org_cp_name_en')
                                    ->label(__('Contact Person for the Organization (English)'))
                                    ->maxLength(255)
                                    ->required(),
                                Forms\Components\TextInput::make('org_cp_name_cn')
                                    ->label(__('Contact Person for the Organization (Chinese)'))
                                    ->maxLength(255)
                                    ->required(),
                            ]),
                            Forms\Components\Grid::make(3)->schema([
                                Forms\Components\TextInput::make('org_cp_title')
                                    ->label(__('Title of the Contact Person'))
                                    ->maxLength(255)
                                    ->required(),
                                Forms\Components\TextInput::make('org_cp_email')
                                    ->label(__('Email of the Contact Person'))
                                    ->email()
                                    ->maxLength(255)
                                    ->required(),
                            ]),
                            Forms\Components\Grid::make(3)->schema([
                                Forms\Components\TextInput::make('org_cp_phone')
                                    ->label(__('Phone of the Contact Person'))
                                    ->tel()
                                    ->maxLength(255)
                                    ->required(),
                                Forms\Components\TextInput::make('org_cp_whatsapp')
                                    ->label(__('WhatsApp of the Contact Person'))
                                    ->tel()
                                    ->maxLength(255)
                                    ->required(),
                            ]),
                        ]),
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('address')
                            ->label(__('Address'))
                            ->maxLength(255)
                            ->columnSpan(2)
                            ->required(),
                    ]),
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\Select::make('country_id')
                            ->label(__('Country'))
                            ->relationship('country', 'name')
                            ->required(),
                    ]),
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('bsrn')
                            ->label(__('Business Society Registration Number'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('fax')
                            ->label(__('Fax'))
                            ->maxLength(255),
                    ]),
                    Forms\Components\Grid::make(3)
                        ->schema([
                            Forms\Components\Select::make('organization_category_id')
                                ->label(__('Organization Category'))
                                ->relationship('organizationCategory', 'name', fn ($query) => $query->orderBy('id'))
                                ->reactive(),
                            Forms\Components\TextInput::make('organization_category_other')
                                ->label(__('Organization Category Other'))
                                ->maxLength(255)
                                ->visible(fn (Closure $get): Bool => $get('organization_category_id') == 9)
                        ]),
                    Forms\Components\Grid::make(3)
                        ->schema([
                            Forms\Components\Select::make('document_type')
                                ->label(__('Document Type'))
                                ->options([
                                    'bsrc' => __('Business Society Registration Certificate'),
                                    'npod' => __('Non-profit Organization Proof Documents'),
                                    'other' => __('Other'),
                                ]),
                        ]),
                    Forms\Components\Grid::make(3)
                        ->schema([
                            Forms\Components\FileUpload::make('documents')
                                ->label(__('Documents'))
                                ->multiple()
                                ->imagePreviewHeight(100)
                                ->acceptedFileTypes(['application/pdf', 'image/*'])
                                ->enableOpen()
                                ->enableDownload()
                                ->directory('documents')
                                ->maxSize(1024),
                        ]),
                ]),
            Forms\Components\Fieldset::make(__('Other Information'))
                ->schema([
                    Forms\Components\Grid::make(3)
                        ->schema([
                            Forms\Components\CheckboxList::make('newsletters')
                                ->label(__('Newsletters'))
                                ->relationship('newsletters', 'name', fn ($query) => $query->orderBy('id'))
                                ->columnSpanFull()
                                ->columns(3)
                                ->reactive(),
                        ]),
                    Forms\Components\Grid::make(3)
                        ->relationship('organization')
                        ->schema([
                            Forms\Components\TextInput::make('newsletter_other')
                                ->label(__('Newsletter Other'))
                                ->maxLength(255)
                                ->visible(fn (Closure $get): Bool => in_array(18, $get('../newsletters'))),
                        ]),
                    Forms\Components\Grid::make(3)
                        ->relationship('organization')
                        ->schema([
                            Forms\Components\Radio::make('is_volunteer')
                                ->label(__('Volunteer'))
                                ->options([
                                    1 => __('Yes'),
                                    0 => __('No'),
                                ])
                                ->inline(),
                        ]),
                    Forms\Components\Grid::make(3)
                        ->relationship('organization')
                        ->schema([
                            Forms\Components\Select::make('survey_id')
                                ->label(__('Survey'))
                                ->relationship('survey', 'name', fn ($query) => $query->orderBy('id'))
                                ->reactive(),
                            Forms\Components\TextInput::make('survey_other')
                                ->label(__('Survey Other'))
                                ->maxLength(255)
                                ->visible(fn (Closure $get): Bool => $get('survey_id') == 7)
                        ]),
                    Forms\Components\Grid::make()
                        ->relationship('organization')
                        ->schema([
                            Forms\Components\TextInput::make('comment')
                                ->label(__('Comment'))
                                ->maxLength(255)
                                ->columnSpanFull()
                        ]),
                ]),
        ];

        return array_merge($this->getBasicForm(), $competitionForm, $organizationForm);
    }

    protected function getFormModel(): User
    {
        return auth()->user();
    }

    public function submit(): void
    {
        auth()->user()->update($this->form->getState());

        Notification::make()
            ->title(__('Updated successfully'))
            ->success()
            ->send();
    }

    public function render(): View
    {
        return view('livewire.account');
    }
}
