<?php

namespace App\Filament\Resources\HomeProjects\Schemas;

use App\Models\Project;
use Filament\Forms;
use Filament\Schemas\Schema;

class HomeProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('project_id')
                    ->label('Pilih Proyek')
                    ->options(function ($record) {
                        $selectedProjectIds = \App\Models\HomeProject::when($record, function ($query) use ($record) {
                                return $query->where('id', '!=', $record->id);
                            })
                            ->pluck('project_id');

                        return Project::whereNotIn('id', $selectedProjectIds)
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

                Forms\Components\Toggle::make('is_featured')
                    ->label('Jadikan Featured (Unggulan)')
                    ->default(false)
                    ->required(),
            ]);
    }
}
