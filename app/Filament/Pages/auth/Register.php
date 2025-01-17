<?php

namespace App\Filament\Pages\auth;

use Filament\Forms\Form;
use Filament\Pages\Auth\Register as RegisterPage;
use Filament\Pages\Page;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class Register extends RegisterPage
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                PhoneInput::make('phone')
                    ->label('Phone Number')
                    ->required(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent()
            ]);
    }
}
