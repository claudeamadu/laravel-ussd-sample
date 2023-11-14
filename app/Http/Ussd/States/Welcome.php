<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;

class Welcome extends State
{
    protected function beforeRendering(): void
    {
        $name = $this->record->name;

        $this->menu->text('Welcome To Laravel USSD')
            ->lineBreak(2)
            ->line('Select an option')
            ->listing([
                'Airtime Topup',
                'Data Bundle',
                'TV Subscription',
                'ECG/GWCL',
                'Talk To Us'
            ])
            ->lineBreak(2)
            ->text('Powered by Sparors');
    }

    protected function afterRendering(string $argument): void
    {
        //
    }
}
