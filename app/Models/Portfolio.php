<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Portfolio — single-row owner profile.
 *
 * Columns:
 *   id, name, title, bio, location, is_available, email, phone,
 *   github, github_handle, linkedin, linkedin_handle,
 *   resume_url, type_roles, contact_intro, meta_description,
 *   stats (json), tags (json), about_paragraphs (json),
 *   hero_chips (json), created_at, updated_at
 */
class Portfolio extends Model
{
    use HasFactory;

    protected $casts = [
        'is_available'      => 'boolean',
        'stats'             => 'array',
        'tags'              => 'array',
        'about_paragraphs'  => 'array',
        'hero_chips'        => 'array',
    ];
}
