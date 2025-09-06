<?php

namespace App\Filament\Widgets;

use App\Models\Jemaat;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class Chart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Jemaat Baru';

    protected function getData(): array
    {
        $data = Trend::model(Jemaat::class)->between(
            start : now()->startOfYear(),
            end : now()->endOfYear(),
        )
        ->perMonth()
        ->count();
         return [
                'datasets' => [
                [
                    'label' => 'Jemaat Baru',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sept','Nov','Okt','Des'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
