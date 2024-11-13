<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenerimaanstokResource\Pages;
use App\Filament\Resources\PenerimaanstokResource\RelationManagers;
use App\Models\Penerimaanstok;
use App\Models\Barang;
use App\Models\Vendor;
use App\Imports\PenerimaanstokImport; 
use App\Imports\BarangImport; 
use App\Imports\VendorImport; 
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;  
use Maatwebsite\Excel\Facades\Excel; 
use Filament\Forms\Components\FileUpload; 

use Illuminate\Support\Facades\Storage; 
use Filament\Notifications\Notification; 

class PenerimaanstokResource extends Resource
{
    protected static ?string $model = Penerimaanstok::class;

    protected static ?string $navigationLabel = 'Daftar Penerimaan Stok'; 
    protected static ?string $navigationIcon = 'heroicon-o-users'; 
    protected static ?string $navigationGroup = 'Data Penerimaan Stok';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('tanggalreceivestok')
                ->label('Tanggal Receive Stok')
                ->required()
                ->maxLength(100),
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
            ->headerActions([
                Action::make('importExcel')
                    ->label('Import Penerimaan Stok Excel')
                    ->action(function (array $data) {
                        $filePath = Storage::disk('public')->path($data['file']);
                        Excel::import(new PenerimaanstokImport, $filePath);
                        Notification::make()
                            ->title('Data berhasil diimpor!')
                            ->success()
                            ->send();
                    })
                    ->form([
                        FileUpload::make('file')
                            ->label('Pilih File Excel')
                            ->disk('public')
                            ->directory('imports')
                            ->acceptedFileTypes([
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                'application/vnd.ms-excel'
                            ])
                            ->required(),
                    ])
                    ->modalHeading('Import Data Penerimaan Stok')
                    ->modalButton('Import')
                    ->color('success'),
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
