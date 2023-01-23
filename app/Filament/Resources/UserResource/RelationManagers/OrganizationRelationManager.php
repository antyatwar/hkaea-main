<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrganizationRelationManager extends RelationManager
{
    protected static string $relationship = 'organization';

    protected static ?string $recordTitleAttribute = 'org_name_en';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('org_name_en')
                    ->label(__('Organization Name (English)')),
                Forms\Components\TextInput::make('org_name_cn')
                    ->label(__('Organization Name (Chinese)')),
                Forms\Components\TextInput::make('org_pic_name_en')
                    ->label(__('Responsible Person for the Organization (English)')),
                Forms\Components\TextInput::make('org_pic_name_cn')
                    ->label(__('Responsible Person for the Organization (Chinese)')),
                Forms\Components\TextInput::make('org_pic_title')
                    ->label(__('Title of the Responsible Person')),
                Forms\Components\TextInput::make('org_pic_email')
                    ->label(__('Email of the Responsible Person')),
                Forms\Components\TextInput::make('org_pic_phone')
                    ->label(__('Phone of the Responsible Person')),
                Forms\Components\TextInput::make('org_pic_whatsapp')
                    ->label(__('WhatsApp of the Responsible Person')),
                Forms\Components\TextInput::make('org_cp_name_en')
                    ->label(__('Contact Person for the Organization (English)')),
                Forms\Components\TextInput::make('org_cp_name_cn')
                    ->label(__('Contact Person for the Organization (Chinese)')),
                Forms\Components\TextInput::make('org_cp_title')
                    ->label(__('Title of the Contact Person')),
                Forms\Components\TextInput::make('org_cp_email')
                    ->label(__('Email of the Contact Person')),
                Forms\Components\TextInput::make('org_cp_phone')
                    ->label(__('Phone of the Contact Person')),
                Forms\Components\TextInput::make('org_cp_whatsapp')
                    ->label(__('WhatsApp of the Contact Person')),
                Forms\Components\TextInput::make('address')
                    ->label(__('Address')),
                Forms\Components\Select::make('country_id')
                    ->label(__('Country'))
                    ->relationship('country', 'name'),
                Forms\Components\TextInput::make('bsrn')
                    ->label(__('Business Society Registration Number')),
                Forms\Components\TextInput::make('fax')
                    ->label(__('Fax')),
                Forms\Components\Select::make('organization_category_id')
                    ->label(__('Organization Category'))
                    ->relationship('organizationCategory', 'name'),
                Forms\Components\TextInput::make('organization_category_other')
                    ->label(__('Organization Category Other')),
                Forms\Components\Radio::make('is_volunteer')
                    ->label(__('Volunteer'))
                    ->options([
                        1 => __('Yes'),
                        0 => __('No'),
                    ])
                    ->inline(),
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
                    ->enableOpen()
                    ->enableDownload()
                    ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('org_name_en')
                    ->label(__('Organization Name (English)')),
                Tables\Columns\TextColumn::make('org_name_cn')
                    ->label(__('Organization Name (Chinese)')),
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
