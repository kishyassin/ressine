<?php

namespace App\Filament\Resources\DishResource\Pages;

use App\Filament\Resources\DishResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDish extends EditRecord
{
    protected static string $resource = DishResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
