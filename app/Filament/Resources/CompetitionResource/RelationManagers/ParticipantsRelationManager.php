<?php

namespace App\Filament\Resources\CompetitionResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParticipantsRelationManager extends RelationManager
{
    protected static string $relationship = 'participants';

    protected static ?string $recordTitleAttribute = 'english_name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('chinese_name')
                    ->label(__('Chinese Name'))
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('english_name')
                    ->label(__('English Name'))
                    ->maxLength(255)
                    ->required(),
                Forms\Components\DatePicker::make('birth_date')
                    ->label(__('Birth Date'))
                    ->required(),
                Forms\Components\Select::make('gender_id')
                    ->label(__('Gender'))
                    ->relationship('gender', 'name')
                    ->required(),
                Forms\Components\TextInput::make('parent_phone')
                    ->label(__('Parent Phone'))
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('parent_email')
                    ->label(__('Parent Email'))
                    ->email()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('chinese_name')
                    ->label(__('Chinese Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('english_name')
                    ->label(__('English Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->label(__('Birth Date'))
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender.name')
                    ->label(__('Gender'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('parent_phone')
                    ->label(__('Parent Phone'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent_email')
                    ->label(__('Parent Email'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
