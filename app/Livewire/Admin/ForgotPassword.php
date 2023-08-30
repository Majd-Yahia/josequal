<?php

namespace App\Livewire\Admin;

use Exception;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Password;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class ForgotPassword extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount()
    {
        $this->form->fill();
    }

    public function render(): View
    {
        return view('livewire.admin.forgot-password');
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('email')->required()->email(),
        ])->statePath('data');
    }

    public function submit()
    {
        $payload = $this->form->getState();
        try {
            $status = Password::sendResetLink($payload);

            if ($status === Password::RESET_LINK_SENT) {
                return Notification::make()
                    ->title(__($status))
                    ->success()
                    ->send();
            }
            //faild validation throw
            return Notification::make()
                ->title(__($status))
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
