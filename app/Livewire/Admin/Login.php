<?php

namespace App\Livewire\Admin;

use Exception;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Filament\Forms\Form;
use Filament\Notifications\Notification;


class Login extends Component  implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public bool $remember = false;

    public function mount()
    {
        $this->form->fill();
    }

    public function render(): View
    {
        return view('livewire.admin.login');
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('email')->required()->email(),
            TextInput::make('password')->required()->password(),
        ])->statePath('data');
    }

    public function authenticate()
    {
        $credentials = $this->form->getState();
        try {
            if (Auth::attempt($credentials, $this->remember)) {
                // Authentication was successful
                return $this->redirect('/admin', navigate: true);
            }
            // Authentication failed
            // show faild messages
            return  Notification::make()
                ->title('These credentials do not match our records.')
                ->danger()
                ->send();
        } catch (Exception $e) {
            Log::error($e);
            return Notification::make()
                ->title($e->getMessage())
                ->danger()
                ->send();
        }
    }
}
