<?php

namespace App\Filament\Imports;

use App\Models\Jemaat;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class JemaatImporter extends Importer
{
    protected static ?string $model = Jemaat::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nama_jemaat')->label('Nama Jemaat'),
            ImportColumn::make('alamat_jemaat')->label('Alamat Jemaat'),
            ImportColumn::make('nomor_telepon')->label('Nomor Telepon'),
        ];
    }

    public function resolveRecord(): ?Jemaat
    {
       

        return new Jemaat();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your jemaat import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
