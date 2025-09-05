<?php

namespace App\Filament\Resources\AbsensiAcaraResource\Pages;

use App\Filament\Resources\AbsensiAcaraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAbsensiAcara extends EditRecord
{
    protected static string $resource = AbsensiAcaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    
}
