<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class VendorChart extends ChartWidget
{
    protected static ?string $heading = 'Total Barang yang dimasukkan vendor';

    protected function getData(): array
    {
        // Ambil data dari database
        $data = DB::table('penerimaanstoks')
            ->select('namavendor', DB::raw('SUM(quantityorder) as total_quantity'))
            ->groupBy('namavendor')
            ->orderBy('namavendor', 'asc')
            ->get();

        // Inisialisasi array untuk label dan total
        $namavendor = [];
        $totals = [];

        foreach ($data as $row) {
            $namavendor[] = $row->namavendor;
            $totals[] = $row->total_quantity;
        }

        // Struktur data untuk chart
        return [
            'datasets' => [
                [
                    'label' => 'Total Barang dari vendor',
                    'data' => $totals,
                    'backgroundColor' => array_map(function () {
                        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                    }, $totals),
                ],
            ],
            'labels' => $namavendor,
            'options' => [
                'responsive' => true,
                'maintainAspectRatio' => false,
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
