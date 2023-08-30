<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Admin\Base\BaseTable;
use App\Models\User;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class UsersList extends BaseTable
{

    public function __construct()
    {
        $this->setModel(User::class)
            ->setActions([
                EditAction::make()
                    ->model(User::class)
                    ->form([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('email')
                            ->required()
                            ->email(),
                        TextInput::make('password')->nullable()->password()->confirmed(),
                        TextInput::make('password_confirmation')->requiredWith('password')->password(),
                    ]),
                DeleteAction::make(),
            ])
            ->setBulkActions([
                DeleteBulkAction::make(),
            ])
            ->setFilters([])
            ->setColumns([
                SpatieMediaLibraryImageColumn::make('avatar')->collection('avatar'),
                TextColumn::make('name')->searchable(isIndividual: false)->sortable(),
                TextColumn::make('email')->searchable(isIndividual: false)->sortable(),
                TextColumn::make('created_at')->dateTime()
            ])
            ->setHeaderActions([
                CreateAction::make()
                    ->model(User::class)
                    ->form([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('email')
                            ->required()
                            ->email(),
                        TextInput::make('password')
                            ->required()
                            ->password()
                            ->confirmed(),
                        TextInput::make('password_confirmation')
                            ->requiredWith('password')
                            ->password(),
                    ])
            ]);
    }
}
