<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Overall extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Ongoing', Auth::user()->Todo()->where('status','Ongoing')->count())->chart([10,10,10])->chartColor('info'),
            Stat::make('Completed', Auth::user()->Todo()->where('status','Completed')->count())->chart([10,10,10])->chartColor('success'),
             Stat::make('Not Completed', Auth::user()->Todo()->where('status','Not Completed')->count())->chart([10,10,10])->chartColor('danger'),
              Stat::make('Late Completed', Auth::user()->Todo()->where('status','Late Completed')->count())->chart([10,10,10])->chartColor('danger'),
            
        ];
    }
}
