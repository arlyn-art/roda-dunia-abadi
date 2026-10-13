<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        $images = [];
        
        $thumbnailMedia = $project->getFirstMediaUrl('thumbnail');
        $images[] = $thumbnailMedia ?: asset('img/featured-projects/main-image.png');

        foreach ($project->getMedia('galeries') as $media) {
            $images[] = $media->getUrl();
        }

        $projects = Project::orderBy('years', 'desc')->orderBy('id', 'desc')->get();

        $currentIndex = $projects->search(function ($item) use ($project) {
            return $item->id === $project->id;
        });

        $previousProject = $currentIndex > 0 ? $projects[$currentIndex - 1] : null;
        $nextProject = $currentIndex < $projects->count() - 1 ? $projects[$currentIndex + 1] : null;

        return view('details.detailProjects', compact('project', 'images', 'previousProject', 'nextProject'));
    }
}
