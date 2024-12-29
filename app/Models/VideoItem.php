<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoItem extends Model
{
    use HasFactory;

    // Table name (optional if you follow Laravel naming conventions)
    protected $table = 'video_items';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'title',
        'url',
        'description',
    ];
}
