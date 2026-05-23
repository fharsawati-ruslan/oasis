<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RealizationDocumentResource\Pages;
use App\Filament\Resources\RealizationDocumentResource\RelationManagers;
use App\Models\RealizationDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RealizationDocumentResource extends Resource
{
    protected static ?string $model = RealizationDocument::class;

   protected static ?string $navigationGroup = 'Documents';

protected static ?string $navigationIcon = 'heroicon-o-folder';

protected static ?string $navigationLabel = 'Realization Documents';

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
            'index' => Pages\ListRealizationDocuments::route('/'),
            'create' => Pages\CreateRealizationDocument::route('/create'),
            'edit' => Pages\EditRealizationDocument::route('/{record}/edit'),
        ];
    }
}
