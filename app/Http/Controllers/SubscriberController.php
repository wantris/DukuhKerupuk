<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use Twilio\Twiml;

class SubscriberController extends Controller
{
    public function register(Request $request)
    {
        $phoneNumber   = $request->input('From');
        $message       = $request->input('Body');
        $outputMessage = $this->createMessage($phoneNumber, $message);

        $response = new Twiml();
        $response->message($outputMessage);

        return response($response)
            ->header('Content-Type', 'text/xml');
    }

    private function createMessage($phone, $message)
    {
        $subscriber = Subscriber::where('phone_number', $phone)->first();
        if (!$subscriber) {
            $subscriber = new Subscriber;
            $subscriber->phoneNumber = $phone;
            $subscriber->subscribed  = false;

            $subscriber->save();
        }

        return $this->generateOutputMessage($subscriber, $message);
    }

    private function generateOutputMessage($subscriber, $message)
    {
        $subscribe = 'add';
        $message = trim(strtolower($message));

        if (!$this->isValidCommand($message)) {
            return $this->messageText();
        }

        $isSubscribed = starts_with($message, $subscribe);
        $subscriber->subscribed = $isSubscribed;
        $subscriber->save();

        return $isSubscribed
            ? $this->messageText('add')
            : $this->messageText('remove');
    }

    private function isValidCommand($command)
    {
        return starts_with($command, 'add') || starts_with($command, 'remove');
    }

    private function messageText($messageType = 'unknown')
    {
        switch ($messageType) {
            case 'add':
                return "Thank you for subscribing to notifications!";
                break;
            case 'remove':
                return "The number you texted from will no longer receive notifications. 
            To start receiving notifications again, please text 'add'.";
                break;
            default:
                return "I'm sorry, that's not an option I recognize. 
            Please, let me know if I should 'add' or 'remove' this number from notifications.";
                break;
        }
    }
}
