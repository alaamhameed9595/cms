<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'excerpt',
        'featured_image',
        'status',
        'published_at',
        'seo_title',
        'seo_description',
        'user_id',
        'category_id',
        'gallery_id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now());
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function getReadTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->description));
        $minutes = ceil($words / 200);
        return $minutes . ' min read';
    }

    public function getFeaturedImageUrlAttribute()
    {
        return $this->featured_image
            ? asset('storage/' . $this->featured_image)
            : asset('images/default-post.jpg');
    }

    public function getImageUrlAttribute()
    {
        // If you store the image path in a related gallery model:
        if ($this->gallery && $this->gallery->image) {
            return $this->gallery->image;
        }
        // Or if you store the image path directly in the posts table:
        // return $this->image;

        // Default image if none exists
        return 'default.png';
    }
    public function gallery()
    {
        return $this->belongsTo(gallery::class);
    }
}
