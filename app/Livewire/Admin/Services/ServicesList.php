<?php

namespace App\Livewire\Admin\Services;

use App\Livewire\Admin\Base\BaseTable;
use App\Models\Service;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class ServicesList extends BaseTable
{

    public function __construct()
    {
        $this->setModel(Service::class)
            ->setActions([
                EditAction::make()
                    ->form([
                        Grid::make()
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('image')->collection('image'),
                                SpatieMediaLibraryFileUpload::make('icon')->collection('icon'),
                            ])->columns(2),

                        Grid::make()
                            ->schema([
                                TextInput::make('title')->required(),
                                TextInput::make('description')->required(),
                            ])->columns(2),
                    ]),
                DeleteAction::make(),
            ])
            ->setBulkActions([
                DeleteBulkAction::make(),
            ])
            ->setFilters([])
            ->setColumns([
                SpatieMediaLibraryImageColumn::make('image')->collection('image'),
                SpatieMediaLibraryImageColumn::make('icon')->collection('icon'),
                TextColumn::make('title')->searchable(isIndividual: false)->sortable(),
                TextColumn::make('description')->searchable(isIndividual: false)->sortable(),
            ])
            ->setHeaderActions([
                CreateAction::make()
                    ->model(Service::class)
                    ->form([
                        Grid::make()
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('image')->collection('image'),
                                SpatieMediaLibraryFileUpload::make('icon')->collection('icon'),
                            ])->columns(2),

                        Grid::make()
                            ->schema([
                                TextInput::make('title')->required(),
                                TextInput::make('description')->required(),
                            ])->columns(2),
                    ])
            ]);
    }
}
