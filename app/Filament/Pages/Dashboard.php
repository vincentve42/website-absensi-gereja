<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $pluralModelLabel = 'Beranda';

    protected static ?string $slug = 'Beranda';

    protected static ?string $title = 'Beranda';

    protected static string $view = 'filament.pages.dashboard';
}
