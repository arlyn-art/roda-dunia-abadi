<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class ShowNews extends Component
{
    use WithPagination;

    public $search = '';
    public $sort = 'latest'; 

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
        $query = News::query();
        
        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->sort === 'oldest') {
            $query->orderBy('date', 'asc')->orderBy('id', 'asc');
        } else {
            $query->orderBy('date', 'desc')->orderBy('id', 'desc');
        }

        $articles = $query->paginate(6);

        return view('livewire.show-news', compact('articles'));
    }
}
