<?php

namespace App\Filament\Resources\CampaignResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class TransactionsRelationManager extends RelationManager
{
    protected static string $relationship = 'transactions';


    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('transaction_hash')
            ->columns([
                Tables\Columns\TextColumn::make('transaction_hash')
                    ->formatStateUsing(function ($state) {
                        return substr($state, 0, 8) . '...' . substr($state, -8);
                    })
                    ->copyable()
                    ->copyMessage('Transaction hash copied to clipboard'),
                Tables\Columns\TextColumn::make('amount')
                    ->formatStateUsing(function ($state) {
                        return number_format($state, 8);
                    })
                    ->label('Amount')
                    ->suffix(' APT'),
                Tables\Columns\TextColumn::make('from_address')
                    ->formatStateUsing(function ($state) {
                        return substr($state, 0, 8) . '...' . substr($state, -8);
                    })
                    ->label('From Address')
                    ->copyable()
                    ->copyMessage('From address copied to clipboard'),
                Tables\Columns\TextColumn::make('to_address')
                    ->formatStateUsing(function ($state) {
                        return substr($state, 0, 8) . '...' . substr($state, -8);
                    })
                    ->label('To Address')
                    ->copyable()
                    ->copyMessage('To address copied to clipboard'),
                Tables\Columns\TextColumn::make('organization.name')
                    ->label('Organization'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->actions([
            ])
            ->bulkActions([
            ]);
    }
}
