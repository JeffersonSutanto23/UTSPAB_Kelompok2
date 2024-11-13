<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use App\Imports\BarangImport; 
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

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationLabel = 'Daftar Barang'; 
    protected static ?string $navigationIcon = 'heroicon-o-users'; 
    protected static ?string $navigationGroup = 'Data Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('namabarang')
                ->label('Masukkan nama barang')
                ->required()
                ->maxLength(100),
            Forms\Components\TextInput::make('satuanbarang')
                ->label('Masukkan satuan barang')
                ->required()
                ->maxLength(15),
            Forms\Components\TextInput::make('harga')
                ->label('Masukkan harga barang')
                ->required()
                ->maxLength(30),
            Forms\Components\Select::make('namakategori')
                ->options([
                    'Alat Tulis' => 'Alat Tulis',
                    'Buku' => 'Buku',
                    'Alat Gambar' => 'Alat Gambar',
                    'Perangko' => 'Perangko',
                ])
                ->searchable()
                ->native(false),
            Forms\Components\TextInput::make('stockawal')
                ->label('Stock Awal Produk')
                ->required()
                ->maxLength(11),
            Forms\Components\TextInput::make('barangkeluar')
                ->label('Barang Keluar')
                ->required()
                ->maxLength(11),
            Forms\Components\TextInput::make('barangmasuk')
                ->label('barang Masuk')
                ->required()
                ->maxLength(11),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('namabarang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('satuanbarang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('harga')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('namakategori')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('stockawal')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('barangkeluar')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('barangmasuk')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                Action::make('importExcel')
                    ->label('Import Barang Excel')
                    ->action(function (array $data) {
                        $filePath = Storage::disk('public')->path($data['file']);
                        Excel::import(new BarangImport, $filePath);
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
                    ->modalHeading('Import Data Barang')
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}
