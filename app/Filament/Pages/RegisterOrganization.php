<?php

namespace App\Filament\Pages;

use App\Models\Organization;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;

class RegisterOrganization extends RegisterTenant
{

    public static function getLabel(): string
    {
        return 'Register Organization';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('logo')
                    ->disk('public')
                    ->visibility('public'),
                TextInput::make('name')
                    ->label('Organization Name')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->helperText('A brief description of your organization.')
                    ->columnSpanFull(),
                TextInput::make('impact')
                    ->label('Impact')
                    ->helperText('How does your organization make an impact?')
                    ->required(),
                TextInput::make('address')
                    ->label('Aptos Address')
                    ->helperText('Aptos wallet address for receiving funds')
                    ->columnSpanFull()
                    ->required(),

                // ...
            ]);
    }

    protected function handleRegistration(array $data): Organization
    {
        $organization = Organization::create($data);

        $organization->users()->attach(auth()->user());

        return $organization;
    }
}
