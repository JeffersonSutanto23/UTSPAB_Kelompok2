<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Penerimaanstok;

class PenerimaanstokTabelWidget extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Penerimaanstok::query()
                  ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('tanggalreceivestok')
                ->label('Tanggal Order diterima')
                ->sortable(),
                Tables\Columns\TextColumn::make('namabarang')
                ->label('Barang yang diorder')
                ->sortable(),
                Tables\Columns\TextColumn::make('namavendor')
                ->label('Vendor')
                ->sortable(),
                Tables\Columns\TextColumn::make('quantityorder')
                ->label('Jumlah Barang diorder')
                ->sortable(),
                Tables\Columns\TextColumn::make('hargaorder')
                ->label('Harga Order')
                ->sortable(),
                Tables\Columns\TextColumn::make('statusreceivestok')
                ->label('Status Order')
                ->sortable(),
            ]);
    }
}


