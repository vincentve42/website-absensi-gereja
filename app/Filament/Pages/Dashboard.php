<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AcaraChart;
use App\Filament\Widgets\Chart;
use App\Filament\Widgets\Count;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $pluralModelLabel = 'Beranda';

    protected static ?string $slug = 'Beranda';

    protected static ?string $title = 'Beranda';

    protected static string $view = 'filament.pages.dashboard';

    use HasFiltersForm;


     protected function getHeaderWidgets(): array
     {
        return [
            Count::class,
            Chart::class,
            AcaraChart::class
        ];
     }
    public function filterForms(Form $form) : Form{
        return $form->schema([
            Section::make('')->schema([
                DatePicker::make('start'),
                DatePicker::make('end')

            ])->columns(2)
        ]);
    }
}
