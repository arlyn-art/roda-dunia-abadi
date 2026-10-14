<?php

namespace App\Filament\Resources\HomeNews\Pages;

use App\Filament\Resources\HomeNews\HomeNewsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeNews extends CreateRecord
{
    protected static string $resource = HomeNewsResource::class;
}
