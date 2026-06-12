<?php

namespace App\Filament\Resources\ReceiptTransactionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\RelationManagers\RelationManager;

class DocumentsRelationManager extends RelationManager
{
    protected static string $relationship = 'documents';

    protected static ?string $title = 'Documents';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('file_name')
                    ->label('Document Name')
                    ->required(),

                Forms\Components\FileUpload::make('file_path')
                    ->label('Upload File')
                    ->directory('receipt-transactions')
                    ->disk('public')
                    ->downloadable()
                    ->openable()
                    ->required(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('file_name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('file_type')
                    ->label('Type'),

                Tables\Columns\TextColumn::make('file_size')
                    ->label('Size'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),

            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}