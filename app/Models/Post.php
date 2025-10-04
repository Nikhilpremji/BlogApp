<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
     /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory,SoftDeletes;


     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */


    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'title' => 'string',
            'content' => 'string',
        ];
    }


    /**
     * Get the author of the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeAuthorized($query)
    {
        return $query->where('user_id',Auth::user()->id);
    }


    public function scopeSearch($query, $term)
    {
        if(!$term) return $query;
        $term = trim($term);
        return $query->where(function($qu) use ($term){
                $qu->where('title','LIKE',"%{$term}%")
                ->orWhere('content','LIKE',"%{$term}%");
            });

    }

}
