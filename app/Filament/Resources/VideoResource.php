<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoResource\Pages;
use App\Models\Video;
use App\Models\Category;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class VideoResource extends Resource
{
    use Translatable;

    protected static ?string $model = Video::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->lazy()
                            ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('videoid')
                            ->required()
                            ->maxLength(255)
                            ->lazy()
                            ->unique(Video::class, 'videoid', ignoreRecord: true),


                    ])
                    ->columns(1)
                    ->columnSpan(2),
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'slug')
                            ->searchable()
                            ->default(fn () => Category::where('slug', 'uncategorized')->first()?->id)
                            ->required(),

                        Forms\Components\DatePicker::make('published_at')
                            ->label(__('Published Date'))
                            ->default(now())
                            ->required(),
                    ])
                    ->columnSpan(2),
            ])
            ->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              
                Tables\Columns\TextColumn::make('videoid')
                    ->label(__('Youtube ID2'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('title')
                        ->label(__('Title'))
                        ->sortable()
                        ->searchable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label(__('Category'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label(__('Status'))
                    ->getStateUsing(fn (Video $record): string => $record->published_at?->isPast() ? __('Published') : __('Draft'))
                    ->colors([
                        'success' => 'Published',
                    ]),

                Tables\Columns\TextColumn::make('published_at')
                    ->label(__('Published Date'))
                    ->sortable()
                    ->searchable()
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
                Tables\Actions\DeleteBulkAction::make()
                    ->after(function ($action, $records) {
                        foreach ($records as $record) {
                            Storage::delete($record->image);
                        }
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
        ];
    }
}
