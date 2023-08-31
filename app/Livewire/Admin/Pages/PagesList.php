<?php

namespace App\Livewire\Admin\Pages;

use App\Livewire\Admin\Base\BaseTable;
use App\Models\Page;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class PagesList extends BaseTable
{
    public function __construct()
    {
        $this->setModel(Page::class)
            ->setActions([
                EditAction::make()
                    ->model(Role::class)
                    ->form([
                        TextInput::make('title')->required(),
                        TextInput::make('slug')->required()->unique(),
                        RichEditor::make('content')->required(),
                    ])
                    ->hidden(!auth()->user()->can('pages.edit')),
                DeleteAction::make()->hidden(!auth()->user()->can('pages.destroy')),
            ])
            ->setBulkActions([
                DeleteBulkAction::make()->hidden(!auth()->user()->can('pages.destroy')),
            ])
            ->setFilters([])
            ->setColumns([
                IconColumn::make('slug')->searchable(isIndividual: false)->sortable(),
                TextColumn::make('title')->searchable(isIndividual: false)->sortable(),
                TextColumn::make('created_at')->dateTime()
            ])
            ->setHeaderActions([
                CreateAction::make()
                    ->model(Page::class)
                    ->form([
                        TextInput::make('title')->required(),
                        TextInput::make('slug')->required()->unique(),
                        RichEditor::make('content')->required(),
                    ])->hidden(!auth()->user()->can('pages.create')),
            ]);
    }
}
