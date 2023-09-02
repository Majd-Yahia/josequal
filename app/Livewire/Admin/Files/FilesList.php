<?php

namespace App\Livewire\Admin\Files;



use Filament\Tables\Table;
use App\Livewire\Admin\Base\BaseTable;
use App\Models\KmlFiles;
use App\Models\Media;
use App\Models\User;
use App\Rules\KMLValidator;
use Filament\Forms\Components\FileUpload;
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
use Google\Cloud\Storage\StorageClient;
use Illuminate\Support\Facades\Storage;

class FilesList extends BaseTable
{

    public function __construct()
    {

        $query = KmlFiles::with('owner');

        $this->setQuery($query)
            // $this->setModel(KmlFiles::class)
            ->setBulkActions([
                DeleteBulkAction::make()->hidden(!auth()->user()->can('files.destroy')),
            ])
            ->setColumns([
                // TextColumn::make('short_file_name')->searchable(isIndividual: false)->label('File Name'),
                TextColumn::make('file_name')->searchable(isIndividual: false)->label('File Name'),
                TextColumn::make('file_size')->searchable(isIndividual: false)->label('File Size'),
                TextColumn::make('owner.name')->searchable(isIndividual: false)->label('Owner'),
                TextColumn::make('created_at')->searchable(isIndividual: false)->label('Uploaded At')->sortable(),
            ])
            ->setHeaderActions([
                CreateAction::make()
                    ->using(function (array $data): Model {
                        $fileName = preg_replace('/\s+/', '%20', trim($data['file']));

                        $filePath = Storage::disk('public')->path($data['file']);
                        $storage = new StorageClient([
                            'keyFile' => json_decode(file_get_contents(base_path('google-authnetication-example.json')), true)
                        ]);
                        $bucket = $storage->bucket(config('app.google-bucket'));
                        $bucket = $bucket->upload(
                            fopen($filePath, 'r'),
                            [
                                'predefinedAcl' => 'publicRead'
                            ]
                        );
                        return KmlFiles::query()->create([
                            'file_name' => $fileName,
                            'file_size' => filesize($filePath),
                            'url' => 'https://storage.googleapis.com/'. config('app.google-bucket') .'/' . $fileName,
                            'user_id' => Auth::id(),
                        ]);
                    })
                    ->form([
                        // SpatieMediaLibraryFileUpload::make('kml')->collection('kml')->rules(['file_name' => new KMLValidator]),

                        FileUpload::make('file')->rules(['file' => new KMLValidator])->preserveFilenames(),
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
                    ->disabled(fn ($record) => $record->is_default)
                    ->color(fn ($record) => $record->is_default ? 'success' : 'primary')
                    ->label('Load to Map')
                    ->action(function ($record) {
                        KmlFiles::query()->update(['is_default' => false]);
                        $record->update(['is_default' => true]);
                    }),
                DeleteAction::make()->label('')->hidden(!auth()->user()->can('files.destroy')),
            ])
            ->bulkActions([])
            ->headerActions($this->getHeaderActions())
            ->striped();
    }
}
