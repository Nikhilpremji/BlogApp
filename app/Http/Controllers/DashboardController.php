<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(SearchRequest $request)
    {
        $validated = $request->validated();
        $posts =Post::search($validated['search'] ?? Null)
        ->latest()->paginate(10);
        return view('dashboard',compact('posts'));
    }
}
