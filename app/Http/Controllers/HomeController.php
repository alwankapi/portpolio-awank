<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Certificate;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::ordered()->get();
        $featuredProjects = Project::featured()->ordered()->take(3)->get();
        $skills = Skill::ordered()->get();
        $experiences = Experience::ordered()->get();
        $certificates = Certificate::ordered()->get();

        $skillCategories = $skills->groupBy('category');

        return view('home', compact(
            'projects',
            'featuredProjects',
            'skills',
            'skillCategories',
            'experiences',
            'certificates'
        ));
    }

    public function sendMessage(StoreMessageRequest $request)
    {
        Message::create($request->validated());

        return back()->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
