<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IndividualRelationManager extends RelationManager
{
    protected static string $relationship = 'individual';

    protected static ?string $recordTitleAttribute = 'first_name_en';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name_en')
                    ->label(__('First Name (English)')),
                Forms\Components\TextInput::make('last_name_en')
                    ->label(__('Last Name (English)')),
                Forms\Components\TextInput::make('first_name_cn')
                    ->label(__('First Name (Chinese)')),
                Forms\Components\TextInput::make('last_name_cn')
                    ->label(__('Last Name (Chinese)')),
                Forms\Components\Select::make('gender_id')
                    ->label(__('Gender'))
                    ->relationship('gender', 'name'),
                Forms\Components\DatePicker::make('birth_date')
                    ->label(__('Birth Date')),
                Forms\Components\TextInput::make('address')
                    ->label(__('Address')),
                Forms\Components\Select::make('country_id')
                    ->label(__('Country'))
                    ->relationship('country', 'name'),
                Forms\Components\FileUpload::make('documents')
                    ->label(__('Documents'))
                    ->multiple()
                    ->enableOpen()
                    ->enableDownload()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('phone')
                    ->label(__('Phone')),
                Forms\Components\TextInput::make('fax')
                    ->label(__('Fax')),
                Forms\Components\TextInput::make('occupation')
                    ->label(__('Occupation')),
                Forms\Components\Select::make('qualification_id')
                    ->label(__('Qualification'))
                    ->relationship('qualification', 'name'),
                Forms\Components\TextInput::make('qualification_other')
                    ->label(__('Qualification Other')),
                Forms\Components\Radio::make('is_volunteer')
                    ->label(__('Volunteer'))
                    ->options([
                        1 => __('Yes'),
                        0 => __('No'),
                    ])
                    ->inline(),
                Forms\Components\Select::make('survey_id')
                    ->label(__('Survey'))
                    ->relationship('survey', 'name'),
                Forms\Components\TextInput::make('survey_other')
                    ->label(__('Survey Other')),
                Forms\Components\TextInput::make('comment')
                    ->label(__('Comment'))
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name_en')
                    ->label(__('First Name (English)')),
                Tables\Columns\TextColumn::make('last_name_en')
                    ->label(__('Last Name (English)')),
                Tables\Columns\TextColumn::make('first_name_cn')
                    ->label(__('First Name (Chinese)')),
                Tables\Columns\TextColumn::make('last_name_cn')
                    ->label(__('Last Name (Chinese)')),
                Tables\Columns\TextColumn::make('paid_at')
                    ->label(__('Paid At'))
                    ->sortable()
                    ->date(),
            ])
            ->defaultSort('id', 'desc')
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
