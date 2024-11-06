<?php

namespace App\Filament\Resources\VendorResource\Pages;

use App\Filament\Resources\VendorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVendors extends ListRecords
{
    protected static string $resource = VendorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),  
            Actions\Action::make('cetak_laporan_vendor') 
            ->label('Cetak Laporan Vendor') 
            ->icon('heroicon-o-printer') 
            ->action(fn() => static::cetakLaporan()) 
            ->requiresConfirmation() ->modalHeading('Cetak Laporan Vendor') 
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'), 
            ];
    }
    public static function cetakLaporan() 
    {  
        $data = \App\Models\vendor::all(); 
        $pdf = \PDF::loadView('laporan.cetakvendor', ['data' => $data]);  
        return response()->streamDownload(fn() => print($pdf->output()), 'laporanvendor.pdf'); 
    }
}
