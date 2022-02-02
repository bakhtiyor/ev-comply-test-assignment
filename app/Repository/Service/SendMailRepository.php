<?php

namespace App\Repository\Service;

use App\Mail\WelcomeEmail;
use App\Models\Subscriber;
use Log;
use Mail;

class SendMailRepository implements \App\Repository\SendMailRepositoryInterface
{

    public function sendWelcomeMail(Subscriber $subscriber)
    {
        $email = new WelcomeEmail();
        Mail::to($subscriber->email)->send($email);
    }
}
