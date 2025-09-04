<?php

namespace App\Filament\Exports;

use App\Models\Absensi;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use OpenSpout\Common\Entity\Style\CellAlignment;
use OpenSpout\Common\Entity\Style\CellVerticalAlignment;
use OpenSpout\Common\Entity\Style\Style;


class AbsensiExporter extends Exporter
{
    protected static ?string $model = Absensi::class;

  
    
    public static function getColumns(): array
    {
        
        
        return [
            ExportColumn::make('id')->label('id'),
            ExportColumn::make('Jemaat.nama_jemaat')->label('Nama Jemaat'),
            ExportColumn::make('Acara.nama_acara')->label('Acara'),
            ExportColumn::make('status_kehadiran')->label('Status Kehadiran'),
            
        ];

        
    }
    public static function getCompletedNotificationTitle(Export $export): string
    {
        return 'Export selesai ✅';
    }
    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your absensi export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }
        
        $absensi_sementara = Absensi::all();
        foreach($absensi_sementara as $absensi)
        {
            $absensi->done = 1;
            $absensi->save();
        }
    

        return $body;
    }
    
}
