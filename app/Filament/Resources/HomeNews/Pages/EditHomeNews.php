<?php

namespace App\Filament\Resources\HomeNews\Pages;

use App\Filament\Resources\HomeNews\HomeNewsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeNews extends EditRecord
{
    protected static string $resource = HomeNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
