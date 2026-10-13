<?php

namespace App\Filament\Resources\HomeProjects\Pages;

use App\Filament\Resources\HomeProjects\HomeProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeProject extends EditRecord
{
    protected static string $resource = HomeProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
