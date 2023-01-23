<?php

namespace App\Filament\Resources\CompetitionResource\Pages;

use App\Filament\Resources\CompetitionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompetition extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = CompetitionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
