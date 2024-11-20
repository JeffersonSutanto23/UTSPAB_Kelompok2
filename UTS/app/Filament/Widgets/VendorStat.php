<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;

class VendorStat extends BaseWidget
{
    protected function getStats(): array
    {
        $totalvendor = DB::table('vendors')->count();
        return [
            Card::make('Total vendor', $totalvendor)
            ->description('Jumlah Vendor saat ini')
            ->icon('heroicon-s-academic-cap')
            ->color('success'),
        ];
    }
}


