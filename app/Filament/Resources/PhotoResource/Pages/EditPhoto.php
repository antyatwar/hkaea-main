<?php

namespace App\Filament\Resources\PhotoResource\Pages;

use App\Filament\Resources\PhotoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPhoto extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = PhotoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
