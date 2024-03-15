<?php

namespace App\Http\Livewire;

use App\Models\Podcast;
use Livewire\Component;
use Livewire\WithPagination;

class Podcasts extends Component
{
    use WithPagination;

    public $search;
    public $tags;
    public $lang;

    public $order = "desc";
    public $parentPage;

    protected $queryString = [
        "search" => ["except" => ""],
        "search" => ["except" => ""],
        "tags" => ["except" => ""],
        "order" => ["except" => "desc"],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingOrder()
    {
        $this->resetPage();
    }

    public function updatingTags()
    {
        $this->resetPage();
    }

    public function removeTag($tag)
    {
        $this->tags = collect(explode(",", $this->tags))
            ->filter(fn ($t) => $t !== $tag)
            ->implode(",");
    }

    public function render()
    {
        $podcasts = $this->lang
            ->podcasts()
            ->orderBy("published_at", $this->order);

        if ($this->search) {
            $podcasts
                ->where("title", "like", "%" . $this->search . "%")
                ->orWhere("episode_number", "like", "%" . $this->search . "%");
        }

        if ($this->search) {
            $podcasts->orWhere("title", "like", "%" . $this->search . "%");
        }

        if ($this->tags) {
            $podcasts->withAnyTags(explode(",", $this->tags));
        }

        return view("livewire.podcasts", [
            "podcasts" => $podcasts->paginate(10),
        ]);
    }
}
