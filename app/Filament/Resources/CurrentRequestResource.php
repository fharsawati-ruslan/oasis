<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CurrentRequestResource\Pages;
use App\Filament\Resources\CurrentRequestResource\RelationManagers;
use App\Models\CurrentRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CurrentRequestResource extends Resource
{
    protected static ?string $model = CurrentRequest::class;

   protected static ?string $navigationGroup = 'Requests';

protected static ?string $navigationIcon = 'heroicon-o-clock';

protected static ?string $navigationLabel = 'Current Requests';

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
            'index' => Pages\ListCurrentRequests::route('/'),
            'create' => Pages\CreateCurrentRequest::route('/create'),
            'edit' => Pages\EditCurrentRequest::route('/{record}/edit'),
        ];
    }
}
