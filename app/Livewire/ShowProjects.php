<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProjects extends Component
{
    use WithPagination;

    public $search = '';
    public $sort = ''; 

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSort()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Project::query();

        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('location', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->sort === 'oldest') {
            $query->orderBy('years', 'asc')->orderBy('id', 'asc');
        } elseif ($this->sort === 'latest') {
            $query->orderBy('years', 'desc')->orderBy('id', 'desc');
        } else {
            $query->orderBy('id', 'desc');
        }

        $projects = $query->paginate(9);

        $projects->getCollection()->transform(function ($project) {
            $thumbnailMedia = $project->getFirstMediaUrl('thumbnail');
            $project->thumbnail_url = $thumbnailMedia ?: asset('img/featured-projects/main-image.png');
            return $project;
        });

        return view('livewire.show-projects', [
            'projects' => $projects
        ]);
    }
}