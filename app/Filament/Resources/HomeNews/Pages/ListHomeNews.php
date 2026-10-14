<?php

namespace App\Filament\Resources\HomeNews\Pages;

use App\Filament\Resources\HomeNews\HomeNewsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeNews extends ListRecords
{
    protected static string $resource = HomeNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
