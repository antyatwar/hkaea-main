<?php

namespace App\Filament\Resources\VideoResource\Pages;

use App\Filament\Resources\VideoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVideo extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = VideoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
