<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = ['title', 'issuer', 'certificate_url', 'icon', 'issued_date', 'sort_order'];
}
