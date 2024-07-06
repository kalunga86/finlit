<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Client;

class LogController extends Controller
{
    public function index()
    {
        $activities = Activity::with('user')   
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        
        return view('logs.index', compact('activities'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $log_id)
    {
        $log = Activity::with('user')->find($log_id);
        return view('logs.show', compact('log'));
    }
}
