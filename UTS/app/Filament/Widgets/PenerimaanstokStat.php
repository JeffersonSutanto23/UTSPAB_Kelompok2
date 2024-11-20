<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;

class PenerimaanstokStat extends BaseWidget
{
    protected function getStats(): array
    {
        $totalpenerimaanstok = DB::table('penerimaanstoks')->count();
        return [
            Card::make('Total penerimaan stok', $totalpenerimaanstok)
            ->description('Jumlah Penerimaan Stok saat ini')
            ->icon('heroicon-s-academic-cap')
            ->color('success'),
        ];
    }
}


