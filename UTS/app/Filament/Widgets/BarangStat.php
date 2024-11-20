<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;

class BarangStat extends BaseWidget
{
    protected function getStats(): array
    {
        $totalbarang = DB::table('barangs')->count();
        return [
            Card::make('Total barang', $totalbarang)
            ->description('Jumlah Barang saat ini')
            ->icon('heroicon-s-academic-cap')
            ->color('success'),
        ];
    }
}

