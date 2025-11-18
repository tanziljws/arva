<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'ip_address',
        'user_agent',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
