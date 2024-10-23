<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendorResource\Pages;
use App\Filament\Resources\VendorResource\RelationManagers;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('idvendor')
                ->label('Input ID Vendor')
                ->required()
                ->maxLength(20),
            Forms\Components\TextInput::make('namavendor')
                ->label('Masukkan nama vendor')
                ->required()
                ->maxLength(300),
            Forms\Components\TextInput::make('telepon')
                ->label('Masukkan No.Telepon Vendor')
                ->required()
                ->maxLength(30),
            Forms\Components\TextInput::make('alamat')
                ->label('Masukkan alamat vendor')
                ->required()
                ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('idvendor')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('namavendor')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('telepon')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('alamat')->sortable()->searchable(),
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
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendor::route('/create'),
            'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }
}
