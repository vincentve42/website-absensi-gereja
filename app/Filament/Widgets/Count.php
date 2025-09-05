<?php

namespace App\Filament\Widgets;

use App\Models\Absensi;
use App\Models\Acara;
use App\Models\Jemaat;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Count extends BaseWidget
{
    protected function getStats(): array
    {
        $data = Acara::orderBy('id','asc')->first();
        
        return [
            Stat::make('Jemaat :', Jemaat::count())->descriptionColor('info')->chart([10,10,10])->chartColor('info')->descriptionIcon("heroicon-o-user",IconPosition::Before)->description('Total Jemaat Gereja '),
            Stat::make('Kehadiran : ', $data->total_hadir)->descriptionColor('success')->chart([10,10,10])->chartColor('success')->descriptionIcon("heroicon-o-circle-stack",IconPosition::Before)->description('Total Jemaat Yang Hadir'),
             Stat::make('Acara : ', $data->nama_acara)->descriptionColor('info')->chart([10,10,10])->chartColor('info')->descriptionIcon("heroicon-o-calendar-days",IconPosition::Before)->description('Acara Terakhir'),
        ];
    }
}
