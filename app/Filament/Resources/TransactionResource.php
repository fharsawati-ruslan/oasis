<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Company;
use App\Models\Transaction;
use App\Models\TransactionCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationGroup = 'Finance';

    protected static ?string $navigationLabel = 'Transactions';

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('company_id')
                    ->label('Company')
                    ->options(
                        Company::query()->pluck('company_name', 'id')
                    )
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('transaction_category_id')
                    ->label('Category')
                    ->options(
                        TransactionCategory::query()->pluck('category_name', 'id')
                    )
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('transaction_date')
                    ->required(),

                Forms\Components\Select::make('type')
                    ->options([
                        'income' => 'Income',
                        'expense' => 'Expense',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('amount')
                    ->numeric()
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('invoice_file')
                    ->disk('public')
                    ->directory('invoices')
                    ->image()
                    ->imagePreviewHeight('250')
                    ->openable()
                    ->downloadable()
                    ->previewable(),

                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'submitted' => 'Submitted',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->default('draft')
                    ->required(),

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

                Tables\Columns\BadgeColumn::make('type')
                    ->colors([
                        'success' => 'income',
                        'danger' => 'expense',
                    ]),

                Tables\Columns\ImageColumn::make('invoice_file')
                    ->disk('public')
                    ->label('Invoice')
                    ->square()
                    ->height(60)
                    ->url(
                        fn ($record) => $record->invoice_file
                            ? asset('storage/' . $record->invoice_file)
                            : null
                    )
                    ->openUrlInNewTab(),

                Tables\Columns\TextColumn::make('amount')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'gray' => 'draft',
                        'warning' => 'submitted',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ]),

            ])
            ->filters([

                Tables\Filters\SelectFilter::make('company_id')
                    ->label('Company')
                    ->relationship('company', 'company_name'),

                Tables\Filters\SelectFilter::make('transaction_category_id')
                    ->label('Category')
                    ->relationship('category', 'category_name'),

            ])
            ->actions([

                Tables\Actions\Action::make('preview')
                    ->icon('heroicon-o-eye')
                    ->label('Preview')
                    ->url(
                        fn ($record) => $record->invoice_file
                            ? asset('storage/' . $record->invoice_file)
                            : '#'
                    )
                    ->openUrlInNewTab(),

                Tables\Actions\Action::make('download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->label('Download')
                    ->url(
                        fn ($record) => $record->invoice_file
                            ? asset('storage/' . $record->invoice_file)
                            : '#'
                    )
                    ->openUrlInNewTab(),

                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}