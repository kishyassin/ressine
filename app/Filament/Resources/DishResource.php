<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DishResource\Pages;
use App\Models\Dish;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DishResource extends Resource
{
    protected static ?string $model = Dish::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('MAD'),
                Forms\Components\TextInput::make('imageSlide')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('imageHero')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('imageIcon')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Select::make('category_id') // Use Select component
                ->label('Category')
                    ->required()
                    ->relationship('category', 'title') // Define relationship
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultGroup('category.title')
            ->columns([
                Tables\Columns\TextColumn::make('imageIcon'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('featured'),
                Tables\Columns\TextColumn::make('price')
                    ->money('MAD')
                    ->sortable(),
                Tables\Columns\TextColumn::make('imageSlide'),
                Tables\Columns\TextColumn::make('imageHero'),
                Tables\Columns\TextColumn::make('average_rating')
                    ->label('Average Rating')
                    ->formatStateUsing(fn($record) => number_format($record->ratings()->avg('rating'), 1)),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDishes::route('/'),
            'create' => Pages\CreateDish::route('/create'),
            'edit' => Pages\EditDish::route('/{record}/edit'),
        ];
    }
}
