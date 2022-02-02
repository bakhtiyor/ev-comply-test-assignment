<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class SubscriptionController extends Controller
{
    public function create()
    {
        return view('subscriptions.create');
    }

    public function store(Request $request)
    {
//        return response()->json(['message' => 'duplicate'], 409);
        return response()->json(['message'=>'ok'], 201);
        Log::info($request->get('email'));
    }
}
