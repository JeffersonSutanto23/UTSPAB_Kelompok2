<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenerimaanstokResource\Pages;
use App\Filament\Resources\PenerimaanstokResource\RelationManagers;
use App\Models\Penerimaanstok;
use App\Models\Barang;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenerimaanstokResource extends Resource
{
    protected static ?string $model = Penerimaanstok::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\DateTimePicker::make('tanggalreceivestok')
                ->label('Tanggal Penerimaan stok')
                ->required() 
                ->format('Y-m-d') 
                ->placeholder('Pilih tanggal Penerimaan stok') 
                ->columnSpan(1),
            Forms\Components\TextInput::make('namavendor')
                ->label('Masukkan nama vendor')
                ->required()
                ->maxLength(30),
            Forms\Components\TextInput::make('namabarang')
                ->label('Masukkan nama barang')
                ->required()
                ->maxLength(100),
            Forms\Components\TextInput::make('quantityorder')
                ->label('Masukkan quantity barang')
                ->required()
                ->maxLength(11),
            Forms\Components\TextInput::make('hargaorder')
                ->label('Masukkan harga barang')
                ->required()
                ->maxLength(30),
            Forms\Components\TextInput::make('statusreceivestok')
                ->label('Status Penerimaan Stok')
                ->required()
                ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggalreceivestok')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('namavendor')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('namabarang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('quantityorder')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('hargaorder')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('statusreceivestok')->sortable()->searchable(),
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
            'index' => Pages\ListPenerimaanstoks::route('/'),
            'create' => Pages\CreatePenerimaanstok::route('/create'),
            'edit' => Pages\EditPenerimaanstok::route('/{record}/edit'),
        ];
    }
}
