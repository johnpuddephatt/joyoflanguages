<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\MyFlexibleCast;
use Whitecube\NovaFlexibleContent\Concerns\HasFlexible;

class Page extends Model
{
    use HasFactory;
    use HasFlexible;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "title",
        "content",
        "introduction",
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
        } else {
            $path .= "//";
            $path .= $this->language ? $this->language->slug . "." : "";
            $url = explode("://", config("app.url"));
            $path .= end($url);
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

    public function language()
    {
        return $this->belongsTo(\App\Models\Language::class, "language_id");
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
                ->select("id", "title", "parent_id", "slug", "language_id")
                ->get()
                ->sortBy([["language_id", "asc"], ["URL", "asc"]])
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

    public static function getTemplateUrl($template, $language_id = null)
    {
        return \App\Models\Page::where("language_id", $language_id)->firstWhere(
            "template",
            $template
        )?->url;
    }

    public function resolveContent()
    {
        $this->content = (new $this->template())->resolve($this);
        return $this;
    }
}
