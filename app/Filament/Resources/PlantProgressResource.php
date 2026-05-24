<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlantProgressResource\Pages;
use App\Filament\Resources\PlantProgressResource\RelationManagers;
use App\Models\PlantProgress;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlantProgressResource extends Resource
{
    protected static ?string $model = PlantProgress::class;

    protected static ?string $navigationGroup = 'Plant Monitoring';

protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

protected static ?string $navigationLabel = 'Plant Progress';
protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPlantProgress::route('/'),
            'create' => Pages\CreatePlantProgress::route('/create'),
            'edit' => Pages\EditPlantProgress::route('/{record}/edit'),
        ];
    }
}
