<?php

namespace App\Filament\Resources\CompetitionResource\Pages;

use App\Filament\Resources\CompetitionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompetition extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = CompetitionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
