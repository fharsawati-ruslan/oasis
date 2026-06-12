<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReceiptTransactionResource\Pages;
use App\Filament\Resources\ReceiptTransactionResource\RelationManagers\DocumentsRelationManager;
use App\Models\ReceiptTransaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

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

                Forms\Components\Section::make('Receipt Information')
                    ->schema([

                        Forms\Components\Select::make('company_id')
                            ->label('Company')
                          ->relationship('company', 'company_name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\Select::make('category_id')
                            ->label('Category')
                            ->relationship('category', 'category_name')
                            ->searchable()
                            ->preload(),

                        Forms\Components\Select::make('document_type')
                            ->options([
                                'invoice' => 'Invoice',
                                'receipt' => 'Receipt',
                                'transfer' => 'Transfer',
                                'petty_cash' => 'Petty Cash',
                                'other' => 'Other',
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('invoice_number')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('vendor')
                            ->maxLength(255),

                        Forms\Components\DatePicker::make('transaction_date')
                            ->required(),

                        Forms\Components\TextInput::make('amount')
                            ->numeric()
                            ->prefix('IDR')
                            ->required(),

                        Forms\Components\Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'submitted' => 'Submitted',
                                'verified' => 'Verified',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                            ])
                            ->default('draft')
                            ->required(),

                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull(),

                    ])
                    ->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('transaction_date')
                    ->date()
                    ->sortable(),

            Tables\Columns\TextColumn::make('company.company_name')
                    ->label('Company')
                    ->searchable(),

                Tables\Columns\TextColumn::make('category.category_name')
                    ->label('Category')
                    ->searchable(),

                Tables\Columns\TextColumn::make('document_type')
                    ->badge(),

                Tables\Columns\TextColumn::make('amount')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge(),

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
              DocumentsRelationManager::class,
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