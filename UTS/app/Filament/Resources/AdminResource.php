<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminResource\Pages;
use App\Filament\Resources\AdminResource\RelationManagers;
use App\Models\Admin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('userid')
                ->label('Input User ID')
                ->required()
                ->maxLength(20),
            Forms\Components\TextInput::make('nama')
                ->label('Masukkan nama user')
                ->required()
                ->maxLength(30),
            Forms\Components\TextInput::make('password')
                ->label('Masukkan password')
                ->required()
                ->maxLength(20),
            Forms\Components\Select::make('namadepartemen')
                ->options([
                    'Information Technology' => 'Information Technology',
                    'Accounting' => 'Accounting',
                    'Finance' => 'Finance',
                    'Sales & Marketing' => 'Sales & Marketing',
                    'Human Resource' => 'Human Resource',
                ])
                ->searchable()
                ->native(false),
            Forms\Components\TextInput::make('email')
                ->label('Email User')
                ->required()
                ->maxLength(100),
            Forms\Components\TextInput::make('NoHP')
                ->label('No.HP User')
                ->required()
                ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('userid')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('password')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('namadepartemen')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('NoHP')->sortable()->searchable(),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
}