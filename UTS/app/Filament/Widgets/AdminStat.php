<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;

class AdminStat extends BaseWidget
{
    protected function getStats(): array
    {
        // Menghitung total admin di tabel admins
        $totaladmin = DB::table('admins')->count(); // Perhatikan tanda kurung () di sini

        return [
            Card::make('Total admin', $totaladmin)
                ->description('Jumlah Admin saat ini')
                ->icon('heroicon-s-academic-cap') // Menggunakan icon
                ->color('success'),
        ];
    }
}

