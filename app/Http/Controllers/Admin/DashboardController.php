<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Certificate;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'skills' => Skill::count(),
            'experiences' => Experience::count(),
            'certificates' => Certificate::count(),
            'messages' => Message::count(),
            'unread_messages' => Message::unread()->count(),
        ];

        $recentMessages = Message::latestFirst()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
