<?php

namespace App\Filament\Resources\ContactMessages;

use App\Filament\Resources\ContactMessages\Pages\ListContactMessages;
use App\Filament\Resources\ContactMessages\Tables\ContactMessagesTable;
use App\Models\ContactMessage;
use BackedEnum;
use Filament\Actions\ViewAction as ActionsViewAction;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Actions\ViewAction;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\Section; 
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section as ComponentsSection;
use UnitEnum;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;
    protected static string|UnitEnum|null $navigationGroup = 'Contact Emails';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Contact Messages';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return ContactMessagesTable::configure($table)
            ->actions([
                ActionsViewAction::make(), 
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Informasi Pesan Masuk')
                    ->schema([
                        TextEntry::make('name')->label('Nama Lengkap'),
                        TextEntry::make('email')->label('Email'),
                        TextEntry::make('phone')->label('Nomor Telepon'),
                        TextEntry::make('company')->label('Perusahaan'),
                        TextEntry::make('created_at')->label('Waktu Dikirim')->dateTime('d M Y, H:i'),
                        TextEntry::make('message')
                            ->label('Pesan')
                            ->columnSpanFull(),
                    ])->columns(2)
            ]);
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
            'index' => ListContactMessages::route('/'),
        ];
    }
}