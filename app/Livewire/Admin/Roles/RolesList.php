<?php

namespace App\Livewire\Admin\Roles;

use App\Livewire\Admin\Base\BaseTable;
use App\Models\Permission;
use App\Models\Role;
// use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class RolesList extends BaseTable
{
    public function getPermissionsOptions()
    {
        $options = [];
        $permissions = Permission::get()->groupBy('category')->toArray();
        foreach ($permissions as $key => $category) {
            $options[ucfirst($key)] =  Arr::pluck($category, 'display_name', 'id');
        }
        // return $options;
        return Permission::get()->pluck('display_name', 'id')->toArray();
    }

    public function __construct()
    {
        $this->setModel(Role::class)
            ->setActions([
                EditAction::make()
                    ->model(Role::class)
                    ->form([
                        TextInput::make('name')
                            ->required(),
                        Textarea::make('description')
                            ->required(),
                        // CheckboxList::make('permissions')
                        //     ->searchable()
                        //     ->options($this->getPermissionsOptions())
                        //     ->bulkToggleable()
                        //     ->columns(2)
                        Select::make('permissions')
                            ->searchable()
                            ->multiple()
                            ->required()
                            ->options($this->getPermissionsOptions())
                        // ->relationship(name: 'permissions', titleAttribute: 'display_name')
                    ])
                    ->mutateRecordDataUsing(function (array $data): array {
                        $data['permissions'] = Role::where('id', $data['id'])->first()->permissions()->pluck('id')->toArray();
                        return $data;
                    }),
                DeleteAction::make(),
            ])
            ->setBulkActions([
                DeleteBulkAction::make(),
            ])
            ->setFilters([])
            ->setColumns([
                TextColumn::make('name')->searchable(isIndividual: false)->sortable(),
                TextColumn::make('description')->searchable(isIndividual: false)->sortable(),
                IconColumn::make('active')->boolean(),
                TextColumn::make('created_at')->dateTime()
            ])
            ->setHeaderActions([
                CreateAction::make()
                    ->model(Role::class)
                    ->form([
                        TextInput::make('name')
                            ->required(),
                        Textarea::make('description')
                            ->required(),
                        // CheckboxList::make('permissions')
                        //     ->searchable()
                        //     ->options($this->getPermissionsOptions())
                        //     ->bulkToggleable()
                        //     ->columns(2)
                        Select::make('permissions')
                            ->searchable()
                            ->multiple()
                            ->required()
                            ->options($this->getPermissionsOptions())
                        // ->relationship(name: 'permissions', titleAttribute: 'display_name')
                    ])->using(function (array $data, string $model): Role {
                        $permissions = $data['permissions'];
                        $data =  $model::create($data);
                        $data->syncPermissions($permissions);
                        return $data;
                    })
            ]);
    }
}
