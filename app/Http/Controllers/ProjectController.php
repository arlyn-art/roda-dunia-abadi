<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Settings;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $title = "Projects";
        $projectSettings = Settings::where('group', 'projects')->get()->keyBy('name');
        $meta = $projectSettings['Meta']->payload ?? [];
        $hero = $projectSettings['Hero']->payload ?? [];
        $heroMedia = $hero['hero_media'] ?? null;

        return view('projects', compact('title', 'meta', 'heroMedia'));
    }

    public function show($slug)
    {   
        $project = Project::where('slug', $slug)->firstOrFail();

        $meta = [
            'meta_title' => $project->title,
            // 'meta_description' => strip_tags($project->description ?? ''),
        ];

        $images = [];
        
        $thumbnailMedia = $project->getFirstMediaUrl('thumbnail');
        $images[] = $thumbnailMedia ?: asset('img/featured-projects/thumbnail.jpeg');

        foreach ($project->getMedia('galeries') as $media) {
            $images[] = $media->getUrl();
        }

        $projects = Project::orderBy('years', 'desc')->orderBy('id', 'desc')->get();

        $currentIndex = $projects->search(function ($item) use ($project) {
            return $item->id === $project->id;
        });

        $previousProject = $currentIndex > 0 ? $projects[$currentIndex - 1] : null;
        $nextProject = $currentIndex < $projects->count() - 1 ? $projects[$currentIndex + 1] : null;

        return view('details.detailProjects', compact('project', 'images', 'previousProject', 'nextProject', 'meta'));
    }
}
