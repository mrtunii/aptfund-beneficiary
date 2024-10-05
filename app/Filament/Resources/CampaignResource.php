<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampaignResource\Pages;
use App\Filament\Resources\CampaignResource\RelationManagers;
use App\Models\Campaign;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CampaignResource extends Resource
{
    protected static ?string $model = Campaign::class;

    protected static ?string $tenantOwnershipRelationshipName = 'organization';

    protected static ?string $navigationIcon = 'heroicon-o-globe-europe-africa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull(),
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->helperText('The title of the campaign.')
                    ->columnSpanFull(),
                RichEditor::make('description')
                    ->label('Description')
                    ->helperText('A brief description of the campaign.')
                    ->columnSpanFull()
                    ->required(),
                RichEditor::make('fund_allocation_description')
                    ->label('Fund Allocation Description')
                    ->helperText('A brief description of how funds will be allocated.')
                    ->columnSpanFull()
                    ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization.name')
                    ->label('Organization')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_public')
                    ->label('Public'),
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
            RelationManagers\OrganizationsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCampaigns::route('/'),
            'create' => Pages\CreateCampaign::route('/create'),
            'edit' => Pages\EditCampaign::route('/{record}/edit'),
        ];
    }
}
