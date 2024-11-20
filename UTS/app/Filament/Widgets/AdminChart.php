<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class AdminChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Departemen Admin';

    protected function getData(): array
    {
        // Ambil data dari database
        $data = DB::table('admins')
            ->select('namadepartemen', DB::raw('count(*) as total'))
            ->groupBy('namadepartemen')
            ->orderBy('namadepartemen')
            ->get();

        // Inisialisasi array untuk label dan total
        $namadepartemen = [];
        $totals = [];

        // Proses data untuk chart
        foreach ($data as $row) {
            $namadepartemen[] = $row->namadepartemen;
            $totals[] = $row->total;
        }

        // Struktur data yang akan dikembalikan
        return [
            'datasets' => [
                [
                    'label' => 'Total Admin per Departemen',
                    'data' => $totals,
                    'backgroundColor' => array_map(function () {
                        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                    }, $totals), // Warna acak untuk setiap bar
                ],
            ],
            'labels' => $namadepartemen,
            'options' => [
                'responsive' => true, // Membuat grafik responsif
                'maintainAspectRatio' => false, // Memastikan grafik dapat menyesuaikan
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}