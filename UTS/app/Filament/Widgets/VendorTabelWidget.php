<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Vendor;

class VendorTabelWidget extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Vendor::query()
                  ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('namavendor')
                ->label('Nama Vendor')
                ->sortable(),
                Tables\Columns\TextColumn::make('telepon')
                ->label('Nomor Telepon')
                ->sortable(),
                Tables\Columns\TextColumn::make('alamat')
                ->label('Alamat Vendor')
                ->sortable(),
            ]);
    }
}



