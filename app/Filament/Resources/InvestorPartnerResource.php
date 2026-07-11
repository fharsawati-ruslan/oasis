<?php

namespace App\Filament\Resources;

use App\Filament\Imports\InvestorPartnerImporter;
use App\Filament\Resources\InvestorPartnerResource\Pages;
use App\Models\InvestorPartner;
use Filament\Forms\Components\Select;
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
               
                    TextInput::make('phone')
                ->label('WhatsApp Number')
    ->tel()
    ->placeholder('628123456789')
    ->prefixIcon('heroicon-o-device-phone-mobile')
    ->maxLength(20),

TextInput::make('email')
    ->label('Email')
    ->email()
    ->prefixIcon('heroicon-o-envelope')
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
                    TextInput::make('status')
    ->label('Status')
    ->default('active'),

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

                TextColumn::make('phone')
    ->label('WhatsApp')
    ->searchable(),

TextColumn::make('email')
    ->label('Email')
    ->searchable(),

    TextColumn::make('status')
    ->badge()
    ->colors([
        'success' => 'active',
        'warning' => 'waiting',
        'danger' => 'closed',
    ]),

                TextColumn::make('investment_amount')
                    ->label('Investment')
                   ->money('IDR', locale: 'id')
                    ->sortable(),

                TextColumn::make('profit_sharing')
                    ->label('Profit Sharing')
                     ->money('IDR', locale: 'id')
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

    Tables\Actions\Action::make('whatsapp')
        ->label('WhatsApp')
        ->icon('heroicon-o-chat-bubble-left-right')
        ->color('success')
        ->visible(fn ($record) => filled($record->phone))
        ->url(function ($record) {

            $phone = preg_replace('/[^0-9]/', '', $record->phone);

            $message = urlencode(
                "Halo {$record->investor_name},

Kami dari ERP SAMUDRA ingin menghubungi Bapak/Ibu terkait data investasi yang terdaftar.

Terima kasih."
            );

            return "https://wa.me/{$phone}?text={$message}";
        })
        ->openUrlInNewTab(),

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