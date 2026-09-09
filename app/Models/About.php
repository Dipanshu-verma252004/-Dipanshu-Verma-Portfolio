<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'about';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'designation',
        'short_description',
        'description',
        'profile_image',
        'resume_file',
        'email',
        'phone',
        'location',
        'years_experience',
        'projects_count',
        'clients_count',
        'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'years_experience' => 'integer',
            'projects_count' => 'integer',
            'clients_count' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}
