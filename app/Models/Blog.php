<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'blog_category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'author',
        'published_at',
        'is_published',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'blog_category_id' => 'integer',
            'published_at' => 'datetime',
            'is_published' => 'boolean',
        ];
    }

    /**
     * The category the blog post belongs to.
     */
    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
