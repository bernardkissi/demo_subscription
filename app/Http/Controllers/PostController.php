<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Support\Str;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function create(CreatePostRequest $request, Site $site): JsonResponse
    {   
        if(!$site) {
           abort(404, 'This site cannot be found');
        }

        $post = $site->posts()->create([
            'title' => $name = $request->title,
            'slug' => Str::slug($name),
            'description' => $request->description
        ]);

        return response()->json(['data' => $post], 200);
    }
}
