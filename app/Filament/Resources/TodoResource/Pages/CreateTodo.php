<?php

namespace App\Filament\Resources\TodoResource\Pages;

use App\Filament\Resources\TodoResource;
use Auth;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTodo extends CreateRecord
{
    protected static string $resource = TodoResource::class;

    protected static ?string $pluralModelLabel = 'Create Task';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();
        $data['status'] = "Ongoing";
        return $data;
    }
}
