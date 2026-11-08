<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ResultController extends Controller
{
    public function show(Request $request, Result $result): View
    {
        abort_unless($request->user()->role === 'admin' || $result->user_id === $request->user()->id, 403);

        return view('results.show', compact('result'));
    }
}