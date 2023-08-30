<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Exception;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Filament\Forms\Form;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount()
    {
        $this->form->fill(Auth::user()->toArray());
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('Label')
                ->tabs([
                    Tabs\Tab::make('Account Information')
                        ->icon('heroicon-o-user')
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('avatar')
                                ->collection('avatar')
                                ->avatar()
                                ->imageEditor()
                                ->imageEditorAspectRatios([
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ]),
                            TextInput::make('name')->required(),
                            TextInput::make('email')->required()->email(),
                        ]),
                    Tabs\Tab::make('Change Password')
                        ->icon('heroicon-o-lock-closed')
                        ->schema([
                            TextInput::make('current_password')->requiredWith('password')->password(),
                            TextInput::make('password')->nullable()->password()->confirmed(),
                            TextInput::make('password_confirmation')->requiredWith('password')->password(),
                        ]),
                ])
        ])->statePath('data');
    }

    public function submit()
    {
        $payload = $this->form->getState();
        $user = Auth::user();
        try {
            if (!is_null($payload['current_password'])) {
                if (Hash::check($payload['current_password'], $user->password)) {
                    $payload['password'] = Hash::make($payload['password']);
                } else {
                    return Notification::make()
                        ->title('The current password you entered does not match our records')
                        ->danger()
                        ->send();
                }
            } else {
                Arr::forget($payload, 'password');
            }

            Arr::forget($payload, ['current_password', 'password_confirmation']);

            User::where('id', $user->id)->update($payload);
            return Notification::make()
                ->title('Updated Successfully')
                ->success()
                ->send();
        } catch (Exception $e) {
            Log::error($e);
            return Notification::make()
                ->title($e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function render(): View
    {
        return view('livewire.admin.profile')->layout('components.layouts.admin');
    }
}
