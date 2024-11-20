<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;

class OrderStat extends BaseWidget
{
    protected function getStats(): array
    {
        $totalorder = DB::table('orders')->count();
        return [
            Card::make('Total Order', $totalorder)
            ->description('Jumlah Order saat ini')
            ->icon('heroicon-s-academic-cap')
            ->color('success'),
        ];
    }
}


