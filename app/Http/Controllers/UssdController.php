<?php

namespace App\Http\Controllers;

use Sparors\Ussd\Facades\Ussd;
use App\Http\Ussd\States\Welcome;

// Using it in a controller
class UssdController extends Controller
{
    public function index()
    {
        $ussd = Ussd::machine()
            ->setFromRequest([
                'sessionId' => 'sessionID',
                'network' => 'network',
                'phoneNumber' => 'msisdn',
                'input' => 'userData',
            ])
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

            return response()->json($ussd->run());
    }
}
