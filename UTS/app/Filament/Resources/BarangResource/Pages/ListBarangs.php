<?php

namespace App\Filament\Resources\BarangResource\Pages;

use App\Filament\Resources\BarangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBarangs extends ListRecords
{
    protected static string $resource = BarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),  
            Actions\Action::make('cetak_laporan_barang') 
            ->label('Cetak Laporan Barang') 
            ->icon('heroicon-o-printer') 
            ->action(fn() => static::cetakLaporan()) 
            ->requiresConfirmation() ->modalHeading('Cetak Laporan Barang') 
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'), 
        ];
    }
    public static function cetakLaporan() 
    {  
        $data = \App\Models\barang::all(); 
        $pdf = \PDF::loadView('laporan.cetakbarang', ['data' => $data]);  
        return response()->streamDownload(fn() => print($pdf->output()), 'laporanbarang.pdf'); 
    }
}
