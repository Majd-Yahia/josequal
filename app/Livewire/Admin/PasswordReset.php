<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Exception;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset as PasswordResetEvent;
use Filament\Notifications\Notification;

class PasswordReset extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public ?string $token = '';
    public ?string $email = '';

    public function mount($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
        $this->form->fill();
    }

    public function render(): View
    {
        return view('livewire.admin.password-reset');
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('password')->required()->password()->confirmed(),
            TextInput::make('password_confirmation')->requiredWith('password')->password(),
        ])->statePath('data');
    }

    public function submit()
    {
        $payload = $this->form->getState();
        try {
            $payload = array_merge($payload, ['token' => $this->token, 'email' => $this->email]);
            $status = Password::reset(
                $payload,
                function (User $user, string $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $user->save();

                    event(new PasswordResetEvent($user));
                }
            );

            if ($status === Password::PASSWORD_RESET) {
                Notification::make()
                    ->title(__($status))
                    ->success()
                    ->send();
                return $this->redirect('/login', navigate: true);
            }
            return  Notification::make()
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
