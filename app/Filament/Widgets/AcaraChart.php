<?php

namespace App\Filament\Widgets;

use App\Models\Acara;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class AcaraChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Total Kehadiran';

    protected function getData(): array
    {
        $data = Trend::model(Acara::class)->between(
            start : now()->startOfYear(),
            end : now()->endOfYear(),
        )
        ->perMonth()
        ->sum('total_hadir');
         return [
                'datasets' => [
                [
                    'label' => 'Kehadiran Acara',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sept','Nov','Okt','Des'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
