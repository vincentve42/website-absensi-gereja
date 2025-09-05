<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\Count;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $pluralModelLabel = 'Beranda';

    protected static ?string $slug = 'Beranda';

    protected static ?string $title = 'Beranda';

    protected static string $view = 'filament.pages.dashboard';

     protected function getHeaderWidgets(): array
     {
        return [Count::class];
     }
}
