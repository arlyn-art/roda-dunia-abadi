<?php

namespace App\Filament\Resources\HomeNews\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use App\Models\News;

class HomeNewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('news_id')
                    ->label('Pilih Proyek')
                    ->options(function ($record) {
                        $selectedNewsIds = \App\Models\HomeNews::when($record, function ($query) use ($record) {
                                return $query->where('id', '!=', $record->id);
                            })
                            ->pluck('news_id');

                        return News::whereNotIn('id', $selectedNewsIds)
                            ->pluck('title', 'id');
                    })
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\TextInput::make('sort_order')
                    ->label('Urutan (Nomor)')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }
}
