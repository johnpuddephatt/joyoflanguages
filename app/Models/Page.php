<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\MyFlexibleCast;

class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "title",
        "content",
        "image",
        "parent_id",
        "template",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "content" => MyFlexibleCast::class,
        "image" => \App\Casts\NovaMediaLibraryCast::class,
    ];

    public function getURLAttribute()
    {
        $path = "";
        if ($this->parent) {
            $path .= $this->parent->URL;
        }
        if ($this->slug !== "/") {
            $path .= "/";
        }
        return $path .= $this->slug;
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Page::class, "parent_id");
    }

    public function children()
    {
        return $this->hasMany(\App\Models\Page::class, "parent_id");
    }

    public function indented_title()
    {
        if ($this->parent) {
            if ($this->parent->parent) {
                return "&nbsp;&mdash;&mdash;&mdash;&mdash;&nbsp;&nbsp;&nbsp;{$this->title}";
            } else {
                return "&nbsp;&mdash;&mdash;&nbsp;&nbsp;&nbsp;{$this->title}";
            }
        } else {
            return $this->title;
        }
    }

    public function scopeOrderPagesByUrl($query)
    {
        $ids_ordered = implode(
            ",",
            \App\Models\Page::withoutGlobalScopes()
                ->select("id", "title", "parent_id", "slug")
                ->get()
                ->sortBy("URL")
                ->pluck("id")
                ->toArray()
        );
        if ($ids_ordered) {
            $query->getQuery()->orders = [];
            $query->orderByRaw("FIELD(id, $ids_ordered)");
        }
        return $query;
    }

    public static function getAvailableTemplates($show_all)
    {
        $templates = $show_all
            ? config("page-templates")
            : array_filter(
                config("page-templates"),
                function ($template) {
                    return !$template::unique() ||
                        \App\Models\Page::where("template", $template)
                            ->get()
                            ->isEmpty();
                },
                ARRAY_FILTER_USE_BOTH
            );
        $templateArray = [];
        foreach ($templates as $template) {
            $templateArray[$template] = $template::label();
        }
        return $templateArray;
    }

    public static function getTemplateUrl($template)
    {
        return \App\Models\Page::firstWhere("template", $template)->url;
    }

    public function resolveContent()
    {
        $this->content = (new $this->template())->resolve($this);
        return $this;
    }
}
