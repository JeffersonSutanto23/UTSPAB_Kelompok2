<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PenerimaanstokChart extends ChartWidget
{
    protected static ?string $heading = 'Status Penerimaanstok';

    protected function getData(): array
    {
        // Ambil data dari database
        $data = DB::table('penerimaanstoks')
            ->select('statusreceivestok', DB::raw('count(*) as total'))
            ->groupBy('statusreceivestok')
            ->orderBy('statusreceivestok')
            ->get();

        // Inisialisasi array untuk label dan total
        $statusreceivestok = [];
        $totals = [];

        // Proses data untuk chart
        foreach ($data as $row) {
            $statusreceivestok[] = $row->statusreceivestok;
            $totals[] = $row->total;
        }

        // Struktur data yang akan dikembalikan
        return [
            'datasets' => [
                [
                    'label' => 'Status order',
                    'data' => $totals,
                    'backgroundColor' => array_map(function () {
                        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                    }, $totals), // Warna acak untuk setiap bar
                ],
            ],
            'labels' => $statusreceivestok,
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

