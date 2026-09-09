<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'company_name',
        'designation',
        'location',
        'employment_type',
        'start_date',
        'end_date',
        'is_current',
        'description',
        'technologies',
        'sort_order',
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
            'start_date' => 'date',
            'end_date' => 'date',
            'is_current' => 'boolean',
            'technologies' => 'json',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}
