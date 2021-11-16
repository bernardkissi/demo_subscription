<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Site $site): JsonResponse
    {
        return response()
            ->json(['data'=> $site->load('subscribers')], 200);
    }
}
