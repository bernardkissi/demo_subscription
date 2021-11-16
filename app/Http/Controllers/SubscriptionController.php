<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateSubscriptionRequest;

class SubscriptionController extends Controller
{
    public function subscribe(CreateSubscriptionRequest $request, Site $site): JsonResponse
    {
        $user = User::firstWhere('id', $request->user_id);

        if(!empty($user->sites->where('id', $site->id)->first())) {
            throw new \Exception('You have already subscribe to this site');
        }

        $subscription = $user->subscriptions()->create([
            'plan_id' => $request->plan_id,
            'site_id'  => $site->id,
            'starts_on' => now()
        ]);

        return response()->json(['data' => $subscription], 200);
    }
}
