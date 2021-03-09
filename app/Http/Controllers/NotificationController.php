<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use Twilio\Rest\Client;

class NotificationController extends Controller
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Show the form for creating a notification.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notifications.create');
    }

    public function send(Request $request)
    {
        $this->validate($request, ['message' => 'required']);

        $message  = $request->input('message');
        $imageUrl = $request->input('imageUrl');

        $activeSubscribers = Subscriber::active()->get();
        foreach ($activeSubscribers as $subscriber) {
            $this->sendMessage($subscriber->phoneNumber, $message, $imageUrl);
        }

        $request
            ->session()
            ->flash('status', 'Messages on their way!');

        return redirect()->route('notifications.create');
    }

    private function sendMessage($phoneNumber, $message, $imageUrl = null)
    {
        $twilioPhoneNumber = config('services.twilio')['phoneNumber'];
        $messageParams = array(
            'from' => $twilioPhoneNumber,
            'body' => $message
        );
        if ($imageUrl) {
            $messageParams['mediaUrl'] = $imageUrl;
        }

        $this->client->messages->create(
            $phoneNumber,
            $messageParams
        );
    }
}
