<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use App\Models\Category;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostResource extends Resource
{
    use Translatable;

    protected static ?string $model = Post::class;

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

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->unique(Post::class, 'slug', ignoreRecord: true),

                        Forms\Components\MarkdownEditor::make('content')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label(__('Thumbnail'))
                            ->image()
                            ->maxSize(1024),

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
                    ->columnSpan(1),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__('Image')),

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
                    ->getStateUsing(fn (Post $record): string => $record->published_at?->isPast() ? __('Published') : __('Draft'))
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
