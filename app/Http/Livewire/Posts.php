<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Posts extends Component
{
    use WithPagination;

    public $search;
    public $tags;
    public $lang;
    public $order = "desc";

    protected $queryString = [
        "lang" => ["except" => ""],
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

    public function render()
    {
        $posts = $this->lang
            ? $this->lang->posts()
            : Post::query()->doesntHave("language");

        $posts->orderBy("published_at", $this->order);

        if ($this->search) {
            $posts->where("title", "like", "%" . $this->search . "%");
        }

        if ($this->tags) {
            $posts->withAnyTags(explode(",", $this->tags));
        }

        return view("livewire.posts", [
            "posts" => $posts->paginate(10),
        ]);
    }
}
