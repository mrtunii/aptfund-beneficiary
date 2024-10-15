<?php

namespace App\Filament\Widgets;

use App\Models\Campaign;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Campaigns', Campaign::whereOrganizationId(Filament::getTenant()->id)->count())
                ->icon('heroicon-o-globe-europe-africa'),
            Stat::make('Total Donations', Campaign::whereOrganizationId(Filament::getTenant()->id)->sum('donation_amount') . ' APT')
                ->icon('heroicon-o-currency-dollar'),
            Stat::make('Total Donors', Campaign::whereOrganizationId(Filament::getTenant()->id)->sum('donation_count'))
                ->icon('heroicon-o-users'),
        ];
    }
}
