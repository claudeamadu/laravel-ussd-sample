<?php

namespace App\Http\Ussd\Configurators;

use App\Http\Ussd\States\Welcome;
use Sparors\Ussd\Contracts\Configurator;
use Sparors\Ussd\Machine;

class ArkeselConfigurator implements Configurator
{
    /**
     * @param Machine $machine
     */
    public function configure(Machine $machine): void
    {
        $machine
            ->setFromRequest([
                'sessionId' => 'sessionID',
                'network' => 'network',
                'phoneNumber' => 'msisdn',
                'input' => 'userData',
            ])
            ->setInput('')
            ->setInitialState(Welcome::class)
            ->setResponse(function (string $message, string $action) {
                $continueSession = $action === 'input';
                return [
                    'sessionID' => request('sessionID'),
                    'userID' => request('userID'),
                    'msisdn' => request('msisdn'),
                    'message' => $message,
                    'continueSession' => $continueSession,
                ];
            });
    }
}
