<?php

namespace App\Filament\Pages;

use App\Models\Settings as SettingsModel;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Forms\Components\{
    TextInput,
    Textarea,
    FileUpload,
    RichEditor,
    TagsInput,
    Toggle
};
use UnitEnum;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class Settings extends Page
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static string|UnitEnum|null $navigationGroup = 'Page Settings';
    protected static ?string $navigationLabel = 'Settings';
    protected string $view = 'filament.pages.settings';

    public array $data = [];

    public function mount(): void
    {
        $settings = SettingsModel::all();

        foreach ($settings as $setting) {
            $payload = $setting->payload ?? [];

            if (
                $setting->group === 'home' &&
                $setting->subgroup === 'hero_section'
            ) {
                if (isset($payload['hero_title'])) {
                    $payload = [$payload];
                }

                $payload = collect($payload)
                    ->map(fn ($section) => [
                        'hero_title'    => $section['hero_title'] ?? null,
                        'hero_subtitle' => $section['hero_subtitle'] ?? null,
                        'hero_media'    => $this->normalizeFile($section['hero_media'] ?? null),
                    ])
                    ->values()
                    ->toArray();

                $payload = [
                    'items' => $payload
                ];
            }

            if (
                $setting->group === 'home' &&
                $setting->subgroup === 'support_section'
            ) {
                if (isset($payload['support_title'])) {
                    $payload = [$payload];
                }

                $payload = collect($payload)
                    ->map(fn ($section) => [
                        'support_title'    => $section['support_title'] ?? null,
                        'support_counting' => $section['support_counting'] ?? null,
                        'is_plus' => $section['is_plus'] ?? null,
                        'support_media'    => $this->normalizeFile($section['support_media'] ?? null),
                    ])
                    ->values()
                    ->toArray();

                $payload = [
                    'items' => $payload
                ];
            }

            if (
                $setting->group === 'home' &&
                $setting->subgroup === 'services_section'
            ) {
                if (isset($payload['services_title'])) {
                    $payload = [$payload];
                }

                $payload = collect($payload)
                    ->map(fn ($section) => [
                        'services_title'    => $section['services_title'] ?? null,
                        'services_description' => $section['services_description'] ?? null,
                        'services_media'    => $this->normalizeFile($section['services_media'] ?? null),
                        'services_icon'    => $this->normalizeFile($section['services_icon'] ?? null),
                    ])
                    ->values()
                    ->toArray();

                $payload = [
                    'items' => $payload
                ];
            }

            $this->data[$setting->group][$setting->subgroup] = $payload;
        }

        $this->form->fill($this->data);
    }

    public function save(): void
    {
        $this->data = $this->form->getState();

        foreach ($this->data as $group => $subgroups) {
            if (! is_array($subgroups)) continue;

            foreach ($subgroups as $subgroup => $payload) {
                if (! is_array($payload)) continue;

                if ($subgroup === 'hero_section' && isset($payload['items']) && is_array($payload['items'])) {
                    $payload = collect($payload['items'])
                        ->map(fn ($section) => [
                            'hero_title'    => $section['hero_title'] ?? null,
                            'hero_subtitle' => $section['hero_subtitle'] ?? null,
                            'hero_media'    => $this->normalizeFile($section['hero_media'] ?? null),
                        ])
                        ->filter(fn ($section) =>
                            filled($section['hero_title']) ||
                            filled($section['hero_subtitle']) ||
                            filled($section['hero_media'])
                        )
                        ->values()
                        ->toArray(); 
                }

                if ($subgroup === 'support_section' && isset($payload['items']) && is_array($payload['items'])) {
                    $payload = collect($payload['items'])
                        ->map(fn ($section) => [
                            'support_title'    => $section['support_title'] ?? null,
                            'support_counting' => $section['support_counting'] ?? null,
                            'is_plus' => $section['is_plus'] ?? null,
                            'support_media'    => $this->normalizeFile($section['support_media'] ?? null),
                        ])
                        ->filter(fn ($section) =>
                            filled($section['support_title']) ||
                            filled($section['support_counting']) ||
                            filled($section['is_plus']) ||
                            filled($section['support_media'])
                        )
                        ->values()
                        ->toArray(); 
                }

                if ($subgroup === 'services_section' && isset($payload['items']) && is_array($payload['items'])) {
                    $payload = collect($payload['items'])
                        ->map(fn ($section) => [
                            'services_title'    => $section['services_title'] ?? null,
                            'services_description' => $section['services_description'] ?? null,
                            'services_media'    => $this->normalizeFile($section['services_media'] ?? null),
                            'services_icon' => $this->normalizeFile($section['services_icon'] ?? null),

                        ])
                        ->filter(fn ($section) =>
                            filled($section['services_title']) ||
                            filled($section['services_description']) ||
                            filled($section['services_media']) ||
                            filled($section['services_icon'])
                        )
                        ->values()
                        ->toArray(); 
                }

                SettingsModel::updateOrCreate(
                    [
                        'group'    => $group,
                        'subgroup' => $subgroup,
                    ],
                    [
                        'name'     => ucfirst(str_replace('_', ' ', $subgroup)),
                        'payload'  => $payload,
                    ]
                );
            }
        }

        $this->mount();

        Notification::make()
            ->title('Settings updated successfully')
            ->success()
            ->send();
    }

    protected function normalizeFile($value): ?string
    {
        if (is_array($value)) {
            return collect($value)->first();
        }

        return is_string($value) ? $value : null;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->schema([
                Tabs::make('SettingsTabs')
                    ->tabs([
                        $this->homeTab(),
                    ]),
            ]);
    }

    protected function homeTab(): Tab
    {
        return Tab::make('Home')
            ->schema([
                Tabs::make('HomeSubTabs')
                    ->tabs([
                        Tab::make('Meta Tag')
                            ->schema([
                                TextInput::make('home.meta.meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(255),
                                Textarea::make('home.meta.meta_description')
                                    ->label('Meta Description'),
                                TagsInput::make('home.meta.meta_tag')
                                    ->label('Meta Tag'),
                            ]),
                        
                        Tab::make('Hero Section')
                            ->schema([
                                Repeater::make('items')
                                    ->label('Hero Content')
                                    ->schema([
                                        TextInput::make('hero_title')
                                            ->label('Hero Title')
                                            ->maxLength(150),

                                        Textarea::make('hero_subtitle')
                                            ->label('Hero Subtitle')
                                            ->rows(3),

                                        FileUpload::make('hero_media')
                                            ->label('Hero Media (Foto / Video)')
                                            ->acceptedFileTypes(['image/*', 'video/*'])
                                            ->directory('home/hero')
                                            ->disk('public')
                                            ->multiple(false)
                                            ->helperText('Mendukung file gambar atau video (Max: 10MB)')
                                            ->imagePreviewHeight('200')
                                            ->dehydrateStateUsing(fn ($state) =>
                                                is_array($state) ? array_values($state)[0] ?? null : $state
                                            ),
                                    ])
                                    ->defaultItems(1)
                                    ->maxItems(9)
                                    ->collapsible()
                                    ->itemLabel(fn () => 'Hero Main Section'),
                            ])
                            ->statePath('home.hero_section'),

                        Tab::make('Support Section')
                            ->schema([
                                Repeater::make('items')
                                    ->label('Support Content')
                                    ->schema([
                                        TextInput::make('support_title')
                                            ->label('Support Title')
                                            ->maxLength(150),

                                        TextInput::make('support_counting')
                                            ->label('Support Counting')
                                            ->type('number')
                                            ->inputMode('numeric')
                                            ->rules([
                                                'nullable',
                                                'numeric',
                                            ])
                                            ->helperText('Masukkan angka saja'),
                                        
                                        Toggle::make('is_plus')
                                            ->label('Penambahan tanda "+" pada depan angka')
                                            ->default(false),

                                        FileUpload::make('support_media')
                                            ->label('Support Media (Foto)')
                                            ->acceptedFileTypes(['image/*'])
                                            ->directory('home/supports')
                                            ->disk('public')
                                            ->multiple(false)
                                            ->helperText('Mendukung file gambar (Max: 10MB)')
                                            ->imagePreviewHeight('200')
                                            ->dehydrateStateUsing(fn ($state) =>
                                                is_array($state) ? array_values($state)[0] ?? null : $state
                                            ),
                                    ])
                                    ->defaultItems(1)
                                    ->maxItems(9)
                                    ->collapsible()
                                    ->itemLabel(fn () => 'Support Section'),
                            ])
                            ->statePath('home.support_section'),
                        
                        Tab::make('About Section')
                            ->schema([
                                TextInput::make('about_title')
                                    ->label('About Title')
                                    ->required()
                                    ->maxLength(255),

                                RichEditor::make('about_description')
                                    ->label('About Description')
                                    ->required()
                                    ->columnSpanFull(),

                                FileUpload::make('about_file')
                                    ->label('About File Document')
                                    ->disk('public')
                                    ->directory('home/about-files')
                                    ->acceptedFileTypes([
                                        'application/pdf', 
                                        'application/msword', 
                                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                        'application/vnd.ms-excel',
                                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                                    ]) 
                                    ->maxSize(10240)
                                    ->downloadable()
                                    ->openable(),
                            ])
                            ->columns(2)
                            ->statePath('home.about_section'),
                        
                        Tab::make('Services section')
                            ->schema([
                                Repeater::make('items')
                                    ->label('Services Content')
                                    ->schema([
                                        TextInput::make('services_title')
                                            ->label('Support Title')
                                            ->maxLength(150),

                                        TextInput::make('services_description')
                                            ->label('Services Description')
                                            ->maxLength(150),

                                        FileUpload::make('services_media')
                                            ->label('Services Media (Foto)')
                                            ->acceptedFileTypes(['image/*'])
                                            ->directory('home/services')
                                            ->disk('public')
                                            ->multiple(false)
                                            ->helperText('Mendukung file gambar (Max: 10MB)')
                                            ->imagePreviewHeight('200')
                                            ->dehydrateStateUsing(fn ($state) =>
                                                is_array($state) ? array_values($state)[0] ?? null : $state
                                            ),
                                        FileUpload::make('services_icon')
                                            ->label('Services Icon (Foto)')
                                            ->acceptedFileTypes(['image/*'])
                                            ->directory('home/services')
                                            ->disk('public')
                                            ->multiple(false)
                                            ->helperText('Mendukung file gambar (Max: 10MB)')
                                            ->imagePreviewHeight('200')
                                            ->dehydrateStateUsing(fn ($state) =>
                                                is_array($state) ? array_values($state)[0] ?? null : $state
                                            ),
                                    ])
                                    ->defaultItems(1)
                                    ->maxItems(9)
                                    ->collapsible()
                                    ->itemLabel(fn () => 'Services Section'),
                            ])
                            ->statePath('home.services_section'),
                    ]),
            ]);
    }
}