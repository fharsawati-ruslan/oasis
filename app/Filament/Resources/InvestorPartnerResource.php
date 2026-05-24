<?php

namespace App\Filament\Resources;

use App\Filament\Imports\InvestorPartnerImporter;
use App\Filament\Resources\InvestorPartnerResource\Pages;
use App\Models\InvestorPartner;

use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;

use Filament\Resources\Resource;

use Filament\Tables\Table;
use Filament\Tables;

use Filament\Tables\Columns\TextColumn;

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

                TextInput::make('investor_name')
                    ->label('Investor Name')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('entry_date')
                    ->label('Entry Date'),

                TextInput::make('investment_amount')
                    ->label('Investment Amount')
                    ->numeric()
                    ->prefix('Rp'),

                TextInput::make('partner_name')
                    ->label('Partner Name')
                    ->maxLength(255),

                TextInput::make('land_area')
                    ->label('Land Area')
                    ->placeholder('2 Ha'),

                Textarea::make('address')
                    ->label('Address')
                    ->rows(3),

                DatePicker::make('planting_date')
                    ->label('Planting Date'),

                DatePicker::make('harvest_date')
                    ->label('Harvest Date'),

                DatePicker::make('factory_payment_date')
                    ->label('Factory Payment Date'),

                TextInput::make('profit_sharing')
                    ->label('Profit Sharing')
                    ->numeric()
                    ->prefix('Rp'),

                TextInput::make('destination_account')
                    ->label('Destination Account'),

                Textarea::make('notes')
                    ->label('Notes')
                    ->rows(3),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->columns([

                TextColumn::make('investor_name')
                    ->label('Investor')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('partner_name')
                    ->label('Partner')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('investment_amount')
                    ->label('Investment')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('profit_sharing')
                    ->label('Profit Sharing')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('entry_date')
                    ->label('Entry Date')
                    ->date(),

                TextColumn::make('planting_date')
                    ->label('Planting Date')
                    ->date(),

                TextColumn::make('harvest_date')
                    ->label('Harvest Date')
                    ->date(),

                TextColumn::make('factory_payment_date')
                    ->label('Factory Payment')
                    ->date(),

                TextColumn::make('destination_account')
                    ->label('Account'),

            ])

            ->filters([
                //
            ])

            ->headerActions([

                Tables\Actions\ImportAction::make()
                    ->importer(InvestorPartnerImporter::class),

            ])

            ->actions([

                Tables\Actions\EditAction::make(),

                Tables\Actions\DeleteAction::make(),

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