<?php

namespace App\Filament\Resources\AdminResource\Pages;

use App\Filament\Resources\AdminResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdmins extends ListRecords
{
    protected static string $resource = AdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),  
            Actions\Action::make('cetak_laporan') 
            ->label('Cetak Laporan Admin') 
            ->icon('heroicon-o-printer') 
            ->action(fn() => static::cetakLaporan()) 
            ->requiresConfirmation() ->modalHeading('Cetak Laporan Admin') 
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'), 
            ];
    }
    public static function cetakLaporan() 
    {  
        $data = \App\Models\Admin::all(); 
        $pdf = \PDF::loadView('laporan.cetakadmin', ['data' => $data]);  
        return response()->streamDownload(fn() => print($pdf->output()), 'laporanadmin.pdf'); 
    }
}
