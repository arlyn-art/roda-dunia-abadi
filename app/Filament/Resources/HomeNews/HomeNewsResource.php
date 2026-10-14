<?php

namespace App\Filament\Resources\HomeNews;

use App\Filament\Resources\HomeNews\Pages\CreateHomeNews;
use App\Filament\Resources\HomeNews\Pages\EditHomeNews;
use App\Filament\Resources\HomeNews\Pages\ListHomeNews;
use App\Filament\Resources\HomeNews\Schemas\HomeNewsForm;
use App\Filament\Resources\HomeNews\Tables\HomeNewsTable;
use App\Models\HomeNews;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class HomeNewsResource extends Resource
{
    protected static ?string $model = HomeNews::class;
    protected static string|UnitEnum|null $navigationGroup = 'News Management';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return HomeNewsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeNewsTable::configure($table);
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
            'index' => ListHomeNews::route('/'),
            'create' => CreateHomeNews::route('/create'),
            'edit' => EditHomeNews::route('/{record}/edit'),
        ];
    }
}
