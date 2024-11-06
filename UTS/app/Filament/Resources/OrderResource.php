<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Admin;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('nama')
                ->label('Masukkan Nama User')
                ->required()
                ->maxLength(100),
            Forms\Components\TextInput::make('namabarang')
                ->label('Masukkan Nama Barang')
                ->required()
                ->maxLength(100),
            Forms\Components\TextInput::make('quantityorder')
                ->label('Masukkan Quantity Order')
                ->required()
                ->maxLength(11),
            Forms\Components\TextInput::make('hargaorder')
                ->label('Harga Order')
                ->required()
                ->maxLength(30),
            Forms\Components\TextInput::make('statusorder')
                ->label('Status Order')
                ->required()
                ->maxLength(20),
            Forms\Components\DateTimePicker::make('tanggalorder')
                ->label('Tanggal Order')
                ->required() 
                ->format('Y-m-d') 
                ->placeholder('Pilih tanggal order') 
                ->columnSpan(1),
            Forms\Components\DateTimePicker::make('tanggalreceiveorder')
                ->label('Tanggal Receive Order')
                ->required() 
                ->format('Y-m-d') 
                ->placeholder('Pilih tanggal receive order') 
                ->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('namabarang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('quantityorder')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('hargaorder')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('statusorder')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tanggalorder')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tanggalreceiveorder')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
