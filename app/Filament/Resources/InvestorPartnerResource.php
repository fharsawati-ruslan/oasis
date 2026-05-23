<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvestorPartnerResource\Pages;
use App\Filament\Resources\InvestorPartnerResource\RelationManagers;
use App\Models\InvestorPartner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvestorPartnerResource extends Resource
{
    protected static ?string $model = InvestorPartner::class;

protected static ?string $navigationGroup = 'Investor & Partner';

protected static ?string $navigationIcon = 'heroicon-o-users';

protected static ?string $navigationLabel = 'Investor & Partner Data';

protected static ?int $navigationSort = 1;

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
            'index' => Pages\ListInvestorPartners::route('/'),
            'create' => Pages\CreateInvestorPartner::route('/create'),
            'edit' => Pages\EditInvestorPartner::route('/{record}/edit'),
        ];
    }
}
