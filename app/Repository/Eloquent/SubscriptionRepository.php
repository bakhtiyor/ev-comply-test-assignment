<?php

namespace App\Repository\Eloquent;

use App\Models\Subscriber;
use App\Repository\SubscriptionRepositoryInterface;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{

    public function store($collection = [])
    {
        return Subscriber::create(['email'=>$collection['email']]);
    }
}
