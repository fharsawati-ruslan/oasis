<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DistributionResource\Pages;
use App\Models\Distribution;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DistributionResource extends Resource
{
    protected static ?string $model = Distribution::class;

    protected static ?string $navigationGroup = 'Distribution';

    protected static ?string $navigationIcon = 'heroicon-o-share';

    protected static ?string $navigationLabel = 'Distribution List';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\DatePicker::make('distribution_date')
                    ->label('Distribution Date')
                    ->required(),

                Forms\Components\TextInput::make('bast_number')
                    ->label('BAST Number')
                    ->required(),

                Forms\Components\TextInput::make('block_name')
                    ->label('Block Name')
                    ->required(),

                Forms\Components\Textarea::make('notes')
                    ->label('Notes')
                    ->rows(3),

                Forms\Components\Repeater::make('items')
                    ->relationship()
                    ->label('Distribution Items')
                    ->schema([

                        Forms\Components\TextInput::make('item_name')
                            ->required(),

                        Forms\Components\TextInput::make('quantity')
                            ->numeric()
                            ->required(),

                        Forms\Components\TextInput::make('unit')
                            ->required(),

                    ])
                    ->columns(3)
                    ->defaultItems(1)
                    ->collapsible()
                    ->cloneable(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('distribution_date')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('bast_number')
                    ->searchable(),

                Tables\Columns\TextColumn::make('block_name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('items_count')
                    ->counts('items')
                    ->label('Items'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDistributions::route('/'),
            'create' => Pages\CreateDistribution::route('/create'),
            'edit' => Pages\EditDistribution::route('/{record}/edit'),
        ];
    }
}
