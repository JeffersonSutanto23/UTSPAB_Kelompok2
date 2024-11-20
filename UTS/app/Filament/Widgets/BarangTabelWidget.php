<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Barang;

class BarangTabelWidget extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Barang::query()
                  ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('namabarang')
                ->label('Nama Barang')
                ->sortable(),
                Tables\Columns\TextColumn::make('satuanbarang')
                ->label('Satuan')
                ->sortable(),
                Tables\Columns\TextColumn::make('jumlahstock')
                ->label('Jumlah Stock')
                ->sortable(),
            ]);
    }
}

