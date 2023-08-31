<?php

namespace App\Livewire\Admin\ContactMessages;

use App\Livewire\Admin\Base\BaseTable;
use App\Models\ContactMessage;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;

class ContactMessagesList extends BaseTable
{
    public function __construct()
    {
        $this->setModel(ContactMessage::class)
            ->setActions([
                ViewAction::make()
                    ->form([
                        TextInput::make('name'),
                        TextInput::make('email'),
                        TextInput::make('subject'),
                        Textarea::make('message'),
                    ])->hidden(!auth()->user()->can('contact_messages.show')),
                DeleteAction::make()->hidden(!auth()->user()->can('contact_messages.destroy')),
            ])
            ->setBulkActions([
                DeleteBulkAction::make()->hidden(!auth()->user()->can('contact_messages.destroy')),
            ])
            ->setFilters([])
            ->setColumns([
                TextColumn::make('name')->searchable(isIndividual: false)->sortable(),
                TextColumn::make('email')->searchable(isIndividual: false)->sortable(),
                TextColumn::make('subject')->searchable(isIndividual: false)->sortable(),
                TextColumn::make('read_at')->dateTime(),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->setHeaderActions([]);
    }
}
