<?php

namespace App\Livewire\Admin\Base;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Filament\Forms\Form;

class BaseForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    private $schema = [];
    public $model;

    protected function getSchema(): array
    {
        return $this->schema;
    }

    protected function setSchema($schema)
    {
        $this->schema = $schema;
        return $this;
    }

    protected function getModel()
    {
        return $this->model;
    }

    protected function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function form(Form $form): Form
    {
        return $form->schema($this->getSchema())->statePath('data');
    }

    public function update(): void
    {
        $this->model::where('id', $this->model->id)->update($this->form->getState());
    }

    public function render(): View
    {
        return view('livewire.admin.base.base-form')->layout('components.layouts.admin');
    }
}
