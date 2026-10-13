<?php

namespace App\Http\Controllers;

use App\Models\HomeProject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $homeProjects = HomeProject::with('project')
            ->orderBy('sort_order', 'asc')
            ->take(9)
            ->get();

        $featuredProjects = HomeProject::with('project')
            ->where('is_featured', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('home', compact('homeProjects', 'featuredProjects'));
    }
}
