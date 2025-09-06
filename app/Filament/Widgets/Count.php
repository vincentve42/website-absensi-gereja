<?php

namespace App\Filament\Widgets;

use App\Models\Absensi;
use App\Models\Acara;
use App\Models\Jemaat;
use Carbon\Carbon;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Count extends BaseWidget
{
    protected function getStats(): array
    {
        $data = Acara::orderBy('id','asc')->first();
        $cont = Jemaat::whereMonth('created_at',Carbon::now()->month)->count();
        return [
                Stat::make('Jemaat :', Jemaat::count())->descriptionColor('info')->chart([10,10,10])->chartColor('info')->descriptionIcon("heroicon-o-user",IconPosition::Before)->description('Total Jemaat Gereja '),
                Stat::make('Kehadiran : ', $data->total_hadir)->descriptionColor('success')->chart([10,10,10])->chartColor('success')->descriptionIcon("heroicon-o-circle-stack",IconPosition::Before)->description('Total Jemaat Yang Hadir'),
                $cont > 0

                 ? Stat::make('Jemaat Baru : ', $cont)->descriptionColor('success')->chart([10,10,10])->chartColor('success')->descriptionIcon("heroicon-o-user-plus",IconPosition::Before)->description('Jemaat Baru Bulan Ini')

                 : Stat::make('Jemaat Baru : ', $cont)->descriptionColor('danger')->chart([10,10,10])->chartColor('danger')->descriptionIcon("heroicon-o-user-plus",IconPosition::Before)->description('Jemaat Baru Bulan Ini')
            ];
        
    }
}
