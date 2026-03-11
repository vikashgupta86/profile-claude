<?php
// app/Models/AdminUser.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminUser extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'photo', 'bio', 'resume_pdf',
        'github_url', 'linkedin_url', 'email_contact', 'phone', 'location', 'profile_views'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array {
        return ['password' => 'hashed'];
    }
}
