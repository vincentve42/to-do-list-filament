<?php

namespace App\Filament\Resources\TodoResource\Pages;

use App\Filament\Resources\TodoResource;
use App\Filament\Widgets\Overall;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTodos extends ListRecords
{
    protected static string $resource = TodoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Create Task')->pluralModelLabel('Create Task'),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            Overall::class
        ];
    }
}
