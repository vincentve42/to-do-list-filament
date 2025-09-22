<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OverallWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Completed', Auth::user()->Todo()->where('status','Completed')->get())->chart([10,10,10])->chartColor('success'),
        ];
    }
}
