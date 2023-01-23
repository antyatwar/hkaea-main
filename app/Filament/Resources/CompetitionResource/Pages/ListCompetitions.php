<?php

namespace App\Filament\Resources\CompetitionResource\Pages;

use App\Filament\Resources\CompetitionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompetitions extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = CompetitionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
