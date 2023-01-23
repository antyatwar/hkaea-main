<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use Closure;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public Role $role;

    public function mount(): void
    {
        $amount = 0;

        switch ($this->role->slug) {
            case 'individual':
                $amount = 200;
                break;
            case 'school-npo':
                $amount = 500;
                break;
            case 'organization':
                $amount = 1000;
                break;
        }

        $this->form->fill([
            // 'name' => 'test',
            // 'email' => 'test@example.com',
            // 'password' => 'password',
            // 'passwordConfirmation' => 'password',
            // 'merchant_reference' => 'HKAEA' . time(),
            // 'currency' => 'HKD',
            // 'amount' => $amount,
            // 'customer_ip' => request()->ip(),
            // 'customer_first_name' => 'test',
            // 'customer_last_name' => 'test',
            // 'customer_phone' => '12345678',
            // 'customer_email' => 'test@example.com',
            // 'customer_address' => 'Hong Kong',
            // 'customer_postal_code' => '999077',
            // 'customer_state' => 'NY',
            // 'customer_country' => 'HK',
            // 'network' => 'CreditCard',
            // 'subject' => 'Membership Fee',
            // 'individual.first_name_cn' => 'test',
            // 'individual.last_name_cn' => 'test',
            // 'individual.first_name_en' => 'test',
            // 'individual.last_name_en' => 'test',
            // 'individual.gender_id' => 2,
            // 'individual.birth_date' => '2021-01-01',
            // 'organization.org_name_en' => 'test',
            // 'organization.org_name_cn' => 'test',
            // 'organization.org_pic_name_en' => 'test',
            // 'organization.org_pic_name_cn' => 'test',
            // 'organization.org_pic_title' => 'test',
            // 'organization.org_pic_email' => 'pic@example.com',
            // 'organization.org_pic_phone' => '12345678',
            // 'organization.org_pic_whatsapp' => '12345678',
            // 'organization.address' => 'test',
            // 'organization.country_id' => 100,
        ]);
    }

    protected function getFormSchema(): array
    {
        switch ($this->role->slug) {
            case 'basic':
            case 'individual':
                return $this->getIndividualForm();
            case 'school-npo':
            case 'organization':
                return $this->getOrganizationForm();
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
                            ->unique(User::class),
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

    protected function getPaymentForm(): array
    {
        return [
            Forms\Components\Fieldset::make(__('Payment Information'))
                ->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\Hidden::make('merchant_reference')
                            ->label(__('Merchant Reference'))
                            ->required(),
                        Forms\Components\Hidden::make('currency')
                            ->label(__('Currency'))
                            ->required(),
                        Forms\Components\TextInput::make('amount')
                            ->label(__('Amount'))
                            ->disabled()
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\Hidden::make('customer_ip')
                            ->label(__('Customer IP'))
                            ->required(),
                        Forms\Components\TextInput::make('customer_first_name')
                            ->label(__('Customer First Name'))
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('customer_last_name')
                            ->label(__('Customer Last Name'))
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('customer_phone')
                            ->label(__('Customer Phone'))
                            ->tel()
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('customer_email')
                            ->label(__('Customer Email'))
                            ->email()
                            ->maxLength(255)
                            ->required()
                            ->unique(Order::class),
                        Forms\Components\TextInput::make('customer_address')
                            ->label(__('Customer Address'))
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\Hidden::make('customer_postal_code')
                            ->label(__('Customer Postal Code'))
                            ->required(),
                        Forms\Components\Hidden::make('customer_state')
                            ->label(__('Customer State'))
                            ->required(),
                        Forms\Components\Hidden::make('customer_country')
                            ->label(__('Customer Country'))
                            ->required(),
                        Forms\Components\Select::make('network')
                            ->label(__('Payment Method'))
                            ->options([
                                'Alipay' => 'Alipay',
                                'Wechat' => 'Wechat',
                                'CUP' => 'CUP',
                                'CreditCard' => 'CreditCard',
                                'Atome' => 'Atome',
                                'Fps' => 'Fps',
                            ])
                            ->required(),
                        Forms\Components\Hidden::make('subject')
                            ->label(__('Subject'))
                            ->required(),
                    ]),
                ]),
        ];
    }

    protected function getIndividualForm(): array
    {
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
                            ->relationship('country', 'name'),
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
                    Forms\Components\Grid::make(3)
                        ->relationship('individual')
                        ->schema([
                            Forms\Components\TextInput::make('comment')
                                ->label(__('Comment'))
                                ->maxLength(255)
                                ->columnSpan(2),
                        ]),
                ]),
        ];

        if ($this->role->slug == 'individual') {
            return array_merge($this->getBasicForm(), $this->getPaymentForm(), $individualForm);
        } else {
            return array_merge($this->getBasicForm(), $individualForm);
        }
    }

    protected function getOrganizationForm(): array
    {
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
                                        $set('org_cp_name_en', null);
                                        $set('org_cp_name_cn', null);
                                        $set('org_cp_title', null);
                                        $set('org_cp_email', null);
                                        $set('org_cp_phone', null);
                                        $set('org_cp_whatsapp', null);
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
                                ->visible(fn (Closure $get): Bool => $get('organization_category_id') == 9),
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
                                ->visible(fn (Closure $get): Bool => $get('survey_id') == 7),
                        ]),
                    Forms\Components\Grid::make(3)
                        ->relationship('organization')
                        ->schema([
                            Forms\Components\TextInput::make('comment')
                                ->label(__('Comment'))
                                ->maxLength(255)
                                ->columnSpan(2),
                        ]),
                ]),
        ];

        return array_merge($this->getBasicForm(), $this->getPaymentForm(), $organizationForm);
    }

    protected function getFormModel(): string
    {
        return User::class;
    }

    public function submit()
    {
        $data = $this->form->getState();

        $user = User::create($data);

        $user->roles()->attach($this->role);

        $this->form->model($user)->saveRelationships();

        event(new Registered($user));

        Notification::make()
            ->title(__('The email verification link has been sent to your email address.'))
            ->success()
            ->send();

        $secret = env('PAYMENTASIA_SECRET_KEY');

        $fields = [
            'merchant_reference' => $data['merchant_reference'],
            'currency' => $data['currency'],
            'amount' => $data['amount'],
            'customer_ip' => $data['customer_ip'],
            'customer_first_name' => $data['customer_first_name'],
            'customer_last_name' => $data['customer_last_name'],
            'customer_phone' => $data['customer_phone'],
            'customer_email' => $data['customer_email'],
            'customer_address' => $data['customer_address'],
            'customer_postal_code' => $data['customer_postal_code'],
            'customer_state' => $data['customer_state'],
            'customer_country' => $data['customer_country'],
            'return_url' => 'https://hkaea.test/paymentasia/return',
            'network' => $data['network'],
            'subject' => $data['subject'],
        ];

        $order = $user->orders()->create($fields);

        ksort($fields);

        $fields['sign'] = hash('SHA512', http_build_query($fields) . $secret);

        return redirect()->route('paymentasia', ['fields' => $fields]);
    }

    public function render()
    {
        return view('livewire.register');
    }
}
