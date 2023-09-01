<?php

namespace App\Livewire\Admin\Files;



use Filament\Tables\Table;
use App\Livewire\Admin\Base\BaseTable;
use App\Models\Media;
use App\Models\User;
use App\Rules\KMLValidator;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\Action;


class FilesList extends BaseTable
{

    public function __construct()
    {
        $query = Media::where('model_id', Auth::id())
            ->where('model_type', User::class)
            ->where('collection_name', 'kml')
            ->with('owner');

        $this->setQuery($query)
            ->setBulkActions([
                DeleteBulkAction::make()->hidden(!auth()->user()->can('files.destroy')),
            ])
            ->setColumns([
                TextColumn::make('short_file_name')->searchable(isIndividual: false)->label('File Name'),
                TextColumn::make('file_size')->searchable(isIndividual: false)->label('File Size'),
                TextColumn::make('owner.name')->searchable(isIndividual: false)->label('Owner'),
                TextColumn::make('created_at')->searchable(isIndividual: false)->label('Uploaded At')->sortable(),
            ])
            ->setHeaderActions([
                CreateAction::make()
                    ->using(function (array $data): Model {
                        return User::find(Auth::id());
                    })
                    ->form([
                        SpatieMediaLibraryFileUpload::make('kml')->collection('kml')->rules(['file_name' => new KMLValidator]),
                    ])->hidden(!auth()->user()->can('files.create')),
            ]);
    }

    public function table(Table $table): Table
    {
        $builder = isset($this->query) ? $this->query : $this->getModel()?->filters();

        return $table
            ->query($builder)
            ->columns($this->getColumns())
            ->filters($this->getFilters())
            ->actions([
                Action::make('use')
                    ->icon('heroicon-m-check')
                    ->iconButton()
                    ->disabled(fn ($record) => $record->hasCustomProperty('use'))
                    ->color(fn ($record) => $record->hasCustomProperty('use') ? 'success' : 'primary')
                    ->label('Load to Map')
                    ->action(function ($record) {
                        Media::all()->map(fn ($data) => $data->forgetCustomProperty('use')->save());
                        $record->setCustomProperty('use', true)->save();
                    }),
                DeleteAction::make()->label('')->hidden(!auth()->user()->can('files.destroy')),
            ])
            ->bulkActions([])
            ->headerActions($this->getHeaderActions())
            ->striped();
    }
}
