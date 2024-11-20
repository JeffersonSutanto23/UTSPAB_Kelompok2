<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class OrderChart extends ChartWidget
{
    protected static ?string $heading = 'Total Order per Barang';

    protected function getData(): array
    {
        // Ambil data dari database
        $data = DB::table('orders')
            ->select('namabarang', DB::raw('SUM(quantityorder) as total_quantity'))
            ->groupBy('namabarang')
            ->orderBy('namabarang', 'asc')
            ->get();

        // Inisialisasi array untuk label dan total
        $namabarang = [];
        $totals = [];

        foreach ($data as $row) {
            $namabarang[] = $row->namabarang;
            $totals[] = $row->total_quantity;
        }

        // Struktur data untuk chart
        return [
            'datasets' => [
                [
                    'label' => 'Total Quantity per Barang',
                    'data' => $totals,
                    'backgroundColor' => array_map(function () {
                        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                    }, $totals),
                ],
            ],
            'labels' => $namabarang,
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
