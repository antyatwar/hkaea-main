<?php

namespace App\Filament\Resources\PhotoResource\Pages;

use App\Filament\Resources\PhotoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePhoto extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = PhotoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
