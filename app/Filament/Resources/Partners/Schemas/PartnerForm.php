<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Partner Name')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('logo')
                    ->label('Partner Logo')
                    ->image()
                    ->directory('partners')
                    ->disk('public')
                    ->required()
                    ->acceptedFileTypes(['image/*'])
                    ->helperText('Mendukung file gambar (Max: 10MB)'),

                TextInput::make('url')
                    ->label('Website URL (Opsional)')
                    ->url()
                    ->maxLength(255),

                Toggle::make('is_active')
                    ->label('Active / Show')
                    ->default(true),
            ]);
    }
}
