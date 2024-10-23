<?php

namespace App\Filament\Resources\PenerimaanstokResource\Pages;

use App\Filament\Resources\PenerimaanstokResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenerimaanstoks extends ListRecords
{
    protected static string $resource = PenerimaanstokResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
