<?php

namespace App\Filament\Resources\HomeProjects;

use App\Filament\Resources\HomeProjects\Pages\CreateHomeProject;
use App\Filament\Resources\HomeProjects\Pages\EditHomeProject;
use App\Filament\Resources\HomeProjects\Pages\ListHomeProjects;
use App\Filament\Resources\HomeProjects\Schemas\HomeProjectForm;
use App\Filament\Resources\HomeProjects\Tables\HomeProjectsTable;
use App\Models\HomeProject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class HomeProjectResource extends Resource
{
    protected static ?string $model = HomeProject::class;
    protected static string|UnitEnum|null $navigationGroup = 'Projects Management';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return HomeProjectForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeProjectsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomeProjects::route('/'),
            'create' => CreateHomeProject::route('/create'),
            'edit' => EditHomeProject::route('/{record}/edit'),
        ];
    }
}
