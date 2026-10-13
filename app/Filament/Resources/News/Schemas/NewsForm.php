<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Main Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn ($state, callable $set) => $set(
                                    'slug',
                                    \Illuminate\Support\Str::slug($state)
                                )
                            ),

                        // Forms\Components\TextInput::make('slug')
                        //     ->required()
                        //     ->maxLength(255)
                        //     ->unique('news', 'slug', ignoreRecord: true),

                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->default(fn () => Auth::id())
                            ->required()
                            ->searchable()
                            ->preload(),

                        Forms\Components\DatePicker::make('date')
                            ->default(now())
                            ->required(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active Status')
                            ->default(true)
                            ->required(),

                        Forms\Components\Textarea::make('excerpt')
                            ->label('Excerpt')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('SEO Metadata')
                    ->schema([
                        Forms\Components\TextInput::make('meta_title')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\TagsInput::make('meta_tag')
                            ->placeholder('Ketik tag lalu tekan Enter')
                            ->separator(',')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('meta_description')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->collapsible(),

                Section::make('Thumbnail')
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->collection('thumbnail')
                            ->disk('public')
                            ->image()
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

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
            ]);
    }
}