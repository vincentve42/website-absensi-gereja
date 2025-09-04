<?php

namespace App\Filament\Exports;

use App\Models\Acara;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class AcaraExporter extends Exporter
{
    protected static ?string $model = Acara::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')->label('ID'),
            ExportColumn::make('nama_acara')->label('Nama Acara'),
            ExportColumn::make('tanggal_acara')->label('Tanggal Acara')
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your acara export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
