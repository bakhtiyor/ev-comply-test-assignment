<?php

namespace App\Http\Controllers;

use App\Repository\SubscriptionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    private $subscriberRepository;

    public function __construct(SubscriptionRepositoryInterface $subscriberRepository)
    {
        $this->subscriberRepository = $subscriberRepository;
    }

    public function create()
    {
        return view('subscriptions.create');
    }

    public function store(Request $request)
    {

        $rules = array(
            'email' => 'required|email|unique:subscribers,email'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errorList = array();
            foreach ($validator->messages()->all() as $error)
                $errorList[] = "- $error";
            return response()->json(['message'=>implode('<br>', $errorList)], 400);
        }else{
            $collection = $request->except(['_token','_method']);
            $this->subscriberRepository->store($collection);
            return response()->json(['message'=>'ok'], 201);
        }
    }
}
