<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlantProgressResource\Pages;
use App\Models\PlantProgress;

use Filament\Forms;
use Filament\Forms\Form;

use Filament\Resources\Resource;

use Filament\Tables;
use Filament\Tables\Table;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

use Filament\Tables\Columns\TextColumn;

class PlantProgressResource extends Resource
{
    protected static ?string $model = PlantProgress::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static ?string $navigationGroup = 'Plant Monitoring';

    protected static ?string $navigationLabel = 'Plant Progress';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Laporan Perkembangan Tanaman')
                    ->schema([

                        TextInput::make('nama_mitra')
                            ->required(),

                        TextInput::make('alamat')
                            ->required(),

                        TextInput::make('luas_ha')
                            ->numeric()
                            ->suffix('Ha'),

                        DatePicker::make('tanggal_tanam'),

                    ])->columns(4),

                Section::make('Monitoring Progress 90 Hari')
                    ->schema([

                        Repeater::make('details')
                            ->relationship()
                            ->schema([

                                TextInput::make('hari')
                                    ->numeric(),

                                Select::make('kategori')
                                    ->options([
                                        'kondisi' => 'Kondisi',
                                        'pupuk_dasar' => 'Pupuk Dasar',
                                        'pupuk_majemuk' => 'Pupuk Majemuk',
                                        'nutrisi' => 'Nutrisi',
                                        'panen' => 'Panen',
                                    ]),

                                Select::make('kondisi')
                                    ->options([
                                        'bagus' => 'Bagus',
                                        'sedang' => 'Sedang',
                                        'kurang_baik' => 'Kurang Baik',
                                    ]),

                                DatePicker::make('tanggal'),

                                Textarea::make('keterangan'),

                                FileUpload::make('gambar')
                                    ->image()
                                    ->directory('plant-progress'),

                            ])
                            ->columns(2)
                            ->default([

                                ['hari' => 10, 'kategori' => 'kondisi'],
                                ['hari' => 11, 'kategori' => 'kondisi'],
                                ['hari' => 12, 'kategori' => 'kondisi'],

                                ['hari' => 20, 'kategori' => 'pupuk_dasar'],

                                ['hari' => 25, 'kategori' => 'kondisi'],
                                ['hari' => 26, 'kategori' => 'kondisi'],
                                ['hari' => 27, 'kategori' => 'kondisi'],

                                ['hari' => 40, 'kategori' => 'pupuk_majemuk'],

                                ['hari' => 50, 'kategori' => 'nutrisi'],

                                ['hari' => 56, 'kategori' => 'kondisi'],
                                ['hari' => 57, 'kategori' => 'kondisi'],

                                ['hari' => 90, 'kategori' => 'panen'],

                            ])

                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('nama_mitra'),

                TextColumn::make('alamat'),

                TextColumn::make('luas_ha'),

                TextColumn::make('tanggal_tanam')
                    ->date(),

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlantProgresses::route('/'),
            'create' => Pages\CreatePlantProgress::route('/create'),
            'edit' => Pages\EditPlantProgress::route('/{record}/edit'),
        ];
    }
}