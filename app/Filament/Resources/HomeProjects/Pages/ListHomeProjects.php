<?php

namespace App\Filament\Resources\HomeProjects\Pages;

use App\Filament\Resources\HomeProjects\HomeProjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeProjects extends ListRecords
{
    protected static string $resource = HomeProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
