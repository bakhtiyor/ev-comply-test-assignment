<?php

namespace App\Repository;

use App\Models\Subscriber;

interface SendMailRepositoryInterface
{
    public function sendWelcomeMail(Subscriber $subscriber);
}
