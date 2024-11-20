<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Admin;

class AdminTabelWidget extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Admin::query()
                  ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                ->label('Nama Admin')
                ->sortable(),
                Tables\Columns\TextColumn::make('namadepartemen')
                ->label('Departemen Admin')
                ->sortable(),
                Tables\Columns\TextColumn::make('email')
                ->label('Email Admin')
                ->sortable(),
            ]);
    }
}
