<?php

namespace App\Repository\Eloquent;

use App\Models\Subscriber;
use App\Repository\SubscriptionRepositoryInterface;
use App\Jobs\SendEmailJob;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{

    public function store($collection = [])
    {
        $subscriber = Subscriber::create(['email'=>$collection['email']]);
        dispatch(new SendEmailJob($subscriber));
    }
}
