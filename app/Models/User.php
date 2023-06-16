<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable implements Sortable
{
    use SortableTrait;
    use HasApiTokens, HasFactory, Notifiable;

    public $sortable = [
        "order_column_name" => "sort_order",
        "sort_when_creating" => true,
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "slug",
        "email",
        "enable_login",
        "show_in_staff_directory",
        "password",
        "role",
        "photo",
        "biography",
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope("order", function (Builder $builder) {
            $builder->orderBy("sort_order", "asc");
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ["password", "remember_token"];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "email_verified_at" => "datetime",
        "enable_login" => "boolean",
        "show_in_staff_directory" => "boolean",
        "photo" => \App\Casts\NovaMediaLibraryCast::class,
    ];

    public function getUrlAttribute()
    {
        return route("user.show", ["user" => $this->slug]);
    }
}
