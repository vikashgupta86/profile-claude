<?php
// app/Models/Project.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'short_description', 'thumbnail',
        'tech_stack', 'github_url', 'live_url', 'category', 'is_featured', 'sort_order'
    ];
    protected $casts = ['tech_stack' => 'array', 'is_featured' => 'boolean'];
    public function scopeFeatured($q) { return $q->where('is_featured', true); }
    public function scopeByCategory($q, $cat) { return $cat === 'all' ? $q : $q->where('category', $cat); }
}
