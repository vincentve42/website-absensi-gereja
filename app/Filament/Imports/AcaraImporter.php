<?php

namespace App\Filament\Imports;

use App\Models\Acara;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class AcaraImporter extends Importer
{
    protected static ?string $model = Acara::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nama_acara')->label('Nama Acara'),
           
            ImportColumn::make('total_hadir')->label('Total Hadir'),

            ImportColumn::make('tanggal_acara')->label('Tanggal Acara'),
        ];
    }

    public function resolveRecord(): ?Acara
    {
        return new Acara();

       
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your acara import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
