<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Order;

class OrderTabelWidget extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Order::query()
                  ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                ->label('Nama Admin')
                ->sortable(),
                Tables\Columns\TextColumn::make('namabarang')
                ->label('Barang yang diorder')
                ->sortable(),
                Tables\Columns\TextColumn::make('quantityorder')
                ->label('Jumlah Barang diorder')
                ->sortable(),
                Tables\Columns\TextColumn::make('hargaorder')
                ->label('Harga Order')
                ->sortable(),
            ]);
    }
}


