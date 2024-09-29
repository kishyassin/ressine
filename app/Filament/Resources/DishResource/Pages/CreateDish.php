<?php

namespace App\Filament\Resources\DishResource\Pages;

use App\Filament\Resources\DishResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDish extends CreateRecord
{
    protected static string $resource = DishResource::class;
}
