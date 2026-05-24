<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RabBookResource\Pages;
use App\Filament\Resources\RabBookResource\RelationManagers;
use App\Models\RabBook;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RabBookResource extends Resource
{
    protected static ?string $model = RabBook::class;

  protected static ?string $navigationGroup = 'Finance';

protected static ?string $navigationIcon = 'heroicon-o-calculator';

protected static ?string $navigationLabel = 'RAB Book';
protected static ?int $navigationSort = 6;

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
            'index' => Pages\ListRabBooks::route('/'),
            'create' => Pages\CreateRabBook::route('/create'),
            'edit' => Pages\EditRabBook::route('/{record}/edit'),
        ];
    }
}
