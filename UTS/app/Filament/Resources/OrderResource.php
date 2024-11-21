<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Admin;
use App\Models\Barang;
use App\Imports\OrderImport; 
use App\Imports\AdminImport; 
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

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationLabel = 'Daftar Order'; 
    protected static ?string $navigationIcon = 'heroicon-o-users'; 
    protected static ?string $navigationGroup = 'Data Order';

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
            Forms\Components\DateTimePicker::make('tanggalorder')
                ->label('Tanggal Order')
                ->required() 
                ->format('Y-m-d') 
                ->placeholder('Pilih tanggal Order') 
                ->columnSpan(1),
            Forms\Components\Select::make('statusapproval')
                ->options([
                    'Diapprove Manager' => 'Diapprove Manager',
                    'Pending' => 'Pending',
                    'Dilihat oleh Manager' => 'Dilihat oleh Manager',
                    'Manager sedang sibuk' => 'Manager sedang sibuk',
                ])
                ->searchable()
                ->native(false),
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
                Tables\Columns\TextColumn::make('tanggalorder')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('statusapproval')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                Action::make('importExcel')
                    ->label('Import Order Excel')
                    ->action(function (array $data) {
                        $filePath = Storage::disk('public')->path($data['file']);
                        Excel::import(new OrderImport, $filePath);
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
                    ->modalHeading('Import Data Order')
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
