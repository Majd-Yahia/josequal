<?php

namespace App\Livewire\Admin\Base;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Filament\Tables\Actions\ActionGroup;

class BaseTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    private $columns = []; // columns types ('text')
    private $filters = [];
    private $actions = []; // actions type ('delete')
    private $bulk_actions = []; // actions type ('delete')
    private $header_actions = []; // actions type ('delete')
    private $model;

    // private function getColumn($column)
    // {
    //     $value = match ($column['type']) {
    //         'text' => TextColumn::make($column['name']),
    //     };
    //     return $value;
    // }

    // private function getAction($action)
    // {
    //     $value = match ($action['type']) {
    //         'delete' => DeleteAction::make($action['name'])
    //     };
    //     return $value;
    // }

    protected function getColumns(): array
    {
        // $columns = [];
        // foreach ($this->columns as $column) {
        //     $columns[] = $this->getColumn($column);
        // }
        // return $columns;
        return $this->columns;
    }

    protected function getModel()
    {
        return $this->model::query();
    }

    protected function getFilters(): array
    {
        return $this->filters;
    }

    protected function getActions(): array
    {
        // $actions = [];
        // foreach ($this->actions as $action) {
        //     $actions[] = $this->getAction($action);
        // }
        // return $actions;
        return $this->actions;
    }

    protected function getBulkActions(): array
    {
        return $this->bulk_actions;
    }

    protected function getHeaderActions(): array
    {
        return $this->header_actions;
    }

    protected function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    protected function setFilters($filters)
    {
        $this->filters = $filters;
        return $this;
    }

    protected function setColumns($columns)
    {
        $this->columns = $columns;
        return $this;
    }

    protected function setActions($actions)
    {
        $this->actions = $actions;
        return $this;
    }

    protected function setBulkActions($bulk_actions)
    {
        $this->bulk_actions = $bulk_actions;
        return $this;
    }

    protected function setHeaderActions($header_Actions)
    {
        $this->header_actions = $header_Actions;
        return $this;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getModel())
            ->columns($this->getColumns())
            ->filters($this->getFilters())
            ->actions([
                ActionGroup::make($this->getActions())
            ])
            ->bulkActions([
                BulkActionGroup::make($this->getBulkActions()),
            ])
            ->headerActions($this->getHeaderActions())
            ->striped();
    }

    public function render(): View
    {
        return view('livewire.admin.base.base-table')->layout('components.layouts.admin');
    }
}
