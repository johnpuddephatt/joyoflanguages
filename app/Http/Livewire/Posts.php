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
    public $language;
    public $order = "desc";

    protected $queryString = [
        "search" => ["except" => ""],
        "tags" => ["except" => ""],
        "order" => ["except" => "desc"],
    ];

    public function render()
    {
        $posts = $this->language
            ? $this->language->posts()
            : Post::query()->doesntHave("languages");

        $posts->orderBy("published_at", $this->order);

        if ($this->search) {
            $posts->where("title", "like", "%" . $this->search . "%");
        }

        if ($this->tags) {
            $posts->withAnyTags(explode(",", $this->tags));
        }

        return view("livewire.posts", [
            "posts" => $posts->paginate(8),
        ]);
    }
}
