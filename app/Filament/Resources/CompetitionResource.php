<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompetitionResource\Pages;
use App\Filament\Resources\CompetitionResource\RelationManagers;
use App\Models\Competition;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Support\Str;

class CompetitionResource extends Resource
{
    use Translatable;

    protected static ?string $model = Competition::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Basic')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->lazy()
                            ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->unique(Competition::class, 'slug', ignoreRecord: true),

                        Forms\Components\MarkdownEditor::make('description')
                            ->columnSpanFull()
                            ->required(),
                    ]),

                Forms\Components\Fieldset::make('Processes')
                    ->schema([
                        Forms\Components\Section::make('Process 1')
                            ->schema([
                                Forms\Components\TextInput::make('process_title_1')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('process_date_1')
                                    ->required(),
                                Forms\Components\FileUpload::make('process_image_1')
                                    ->directory('competitions')
                                    ->required()
                                    ->image()
                                    ->maxSize(512),
                            ])
                            ->columnSpan(1),
                        Forms\Components\Section::make('Process 2')
                            ->schema([
                                Forms\Components\TextInput::make('process_title_2')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('process_date_2')
                                    ->required(),
                                Forms\Components\FileUpload::make('process_image_2')
                                    ->directory('competitions')
                                    ->required()
                                    ->image()
                                    ->maxSize(512),
                            ])
                            ->columnSpan(1),
                        Forms\Components\Section::make('Process 3')
                            ->schema([
                                Forms\Components\TextInput::make('process_title_3')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('process_date_3')
                                    ->required(),
                                Forms\Components\FileUpload::make('process_image_3')
                                    ->directory('competitions')
                                    ->required()
                                    ->image()
                                    ->maxSize(512),
                            ])
                            ->columnSpan(1),
                        Forms\Components\Section::make('Process 4')
                            ->schema([
                                Forms\Components\TextInput::make('process_title_4')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('process_date_4')
                                    ->required(),
                                Forms\Components\FileUpload::make('process_image_4')
                                    ->directory('competitions')
                                    ->required()
                                    ->image()
                                    ->maxSize(512),
                            ])
                            ->columnSpan(1),
                    ])
                    ->columns(4),

                Forms\Components\Fieldset::make('Rules')
                    ->schema([
                        Forms\Components\Tabs::make('Rules')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('Painting Format')
                                    ->schema([
                                        Forms\Components\RichEditor::make('painting_format')
                                            ->required()
                                            ->maxLength(65535),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Poster')
                                    ->schema([
                                        Forms\Components\RichEditor::make('poster')
                                            ->required()
                                            ->maxLength(65535),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Age Groups')
                                    ->schema([
                                        Forms\Components\RichEditor::make('age_groups')
                                            ->required()
                                            ->maxLength(65535),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Judging Criteria')
                                    ->schema([
                                        Forms\Components\RichEditor::make('judging_criteria')
                                            ->required()
                                            ->maxLength(65535),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Prizes')
                                    ->schema([
                                        Forms\Components\RichEditor::make('prizes')
                                            ->required()
                                            ->maxLength(65535),
                                    ]),
                            ]),
                    ])
                    ->columns(1),

                Forms\Components\Fieldset::make('Participation')
                    ->schema([
                        Forms\Components\Tabs::make('Participation')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('Payment Method')
                                    ->schema([
                                        Forms\Components\RichEditor::make('payment_method')
                                            ->required()
                                            ->maxLength(65535),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Individual Application')
                                    ->schema([
                                        Forms\Components\RichEditor::make('individual_application')
                                            ->required()
                                            ->maxLength(65535),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Group Application')
                                    ->schema([
                                        Forms\Components\RichEditor::make('group_application')
                                            ->required()
                                            ->maxLength(65535),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Other Details')
                                    ->schema([
                                        Forms\Components\RichEditor::make('other_details')
                                            ->required()
                                            ->maxLength(65535),
                                    ]),
                                Forms\Components\Tabs\Tab::make('Terms')
                                    ->schema([
                                        Forms\Components\RichEditor::make('terms')
                                            ->required()
                                            ->maxLength(65535),
                                    ]),
                            ]),
                    ])
                    ->columns(1),

                Forms\Components\Fieldset::make('Ceremony')
                    ->schema([
                        Forms\Components\FileUpload::make('ceremony_image')
                            ->directory('competitions')
                            ->required()
                            ->image()
                            ->maxSize(512),
                        Forms\Components\RichEditor::make('ceremony_content')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpan(4),
                    ])
                    ->columns(5),

                Forms\Components\Fieldset::make('Previous')
                    ->schema([
                        Forms\Components\Repeater::make('highlights')
                            ->schema([
                                Forms\Components\TextInput::make('youtube_link')
                                    ->url(),
                            ])
                            ->createItemButtonLabel('Add YouTube Share Link')
                            ->collapsible()
                            ->defaultItems(3)
                            ->maxItems(12),
                        Forms\Components\Repeater::make('artworks')
                            ->schema([
                                Forms\Components\FileUpload::make('artwork_image')
                                    ->directory('competitions')
                                    ->image()
                                    ->maxSize(512),
                            ])
                            ->createItemButtonLabel('Add Artwork Photo')
                            ->collapsible()
                            ->defaultItems(3)
                            ->maxItems(12),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('Title')),
                Tables\Columns\TextColumn::make('slug')
                    ->label(__('Slug')),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->date(),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ParticipantsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompetitions::route('/'),
            'create' => Pages\CreateCompetition::route('/create'),
            'edit' => Pages\EditCompetition::route('/{record}/edit'),
        ];
    }
}
