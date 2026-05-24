<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReceiptTransactionResource\Pages;
use App\Filament\Resources\ReceiptTransactionResource\RelationManagers;
use App\Models\ReceiptTransaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReceiptTransactionResource extends Resource
{
    protected static ?string $model = ReceiptTransaction::class;

    protected static ?string $navigationGroup = 'Finance';

protected static ?string $navigationIcon = 'heroicon-o-receipt-percent';

protected static ?string $navigationLabel = 'Receipts & Transactions';
protected static ?int $navigationSort = 8;

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
            'index' => Pages\ListReceiptTransactions::route('/'),
            'create' => Pages\CreateReceiptTransaction::route('/create'),
            'edit' => Pages\EditReceiptTransaction::route('/{record}/edit'),
        ];
    }
}
