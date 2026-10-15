<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true) 
                    ->afterStateUpdated(function (string $operation, $state, \Filament\Schemas\Components\Utilities\Set $set) {
                        $set('slug', Str::slug($state));
                    }),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('location')
                    ->maxLength(255),
                Forms\Components\TextInput::make('years')
                    ->numeric(),
                Forms\Components\RichEditor::make('working')
                    ->columnSpanFull()
                    ->toolbarButtons(['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link',
                        'h2', 'h3', 'textColor', 'alignStart', 'alignCenter', 'alignEnd', 'blockquote',
                        'codeBlock', 'bulletList', 'orderedList', 'table', 'attachFiles', 'undo', 'redo',
                    ]),
                Forms\Components\TextInput::make('partner')
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull()
                    ->toolbarButtons(['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link',
                        'h2', 'h3', 'textColor', 'alignStart', 'alignCenter', 'alignEnd', 'blockquote',
                        'codeBlock', 'bulletList', 'orderedList', 'table', 'attachFiles', 'undo', 'redo',
                    ])
                    ->textColors([
                        '#cf2227' => 'Primary Red', '#808285' => 'Secondary Gray', '#e0e0df' => 'Accent Light', '#404042' => 'Background Dark',
                        '#000000' => 'Black', '#ffffff' => 'White',
                        '#22c55e' => 'Success Green', '#3b82f6' => 'Info Blue', '#eab308' => 'Warning Yellow',
                    ]),

                Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                    ->collection('thumbnail')
                    ->disk('public')
                    ->image()
                    ->required(),

                Forms\Components\SpatieMediaLibraryFileUpload::make('galeries')
                    ->collection('galeries')
                    ->disk('public')
                    ->multiple()
                    ->image()
                    ->reorderable(),
            ]);
    }
}
