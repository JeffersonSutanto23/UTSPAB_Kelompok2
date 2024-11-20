<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BarangChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Jumlah Barang masuk pertahun';

    protected function getData(): array
    {
        // Ambil data dari database
        $data = DB::table('barangs')
            ->select('tahunmasuk', DB::raw('count(*) as total'))
            ->groupBy('tahunmasuk')
            ->orderBy('tahunmasuk')
            ->get();

        // Inisialisasi array untuk label dan total
        $tahunmasuk = [];
        $totals = [];

        // Proses data untuk chart
        foreach ($data as $row) {
            $tahunmasuk[] = $row->tahunmasuk;
            $totals[] = $row->total;
        }

        // Struktur data yang akan dikembalikan
        return [
            'datasets' => [
                [
                    'label' => 'Barang yang masuk per tahun',
                    'data' => $totals,
                    'backgroundColor' => array_map(function () {
                        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                    }, $totals), // Warna acak untuk setiap bar
                ],
            ],
            'labels' => $tahunmasuk,
            'options' => [
                'responsive' => true, // Membuat grafik responsif
                'maintainAspectRatio' => false, // Memastikan grafik dapat menyesuaikan
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
