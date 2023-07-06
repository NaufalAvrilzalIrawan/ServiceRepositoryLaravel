<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The Attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'judul',
        'deskripsi'
    ];

    /**
     * The Attributes that should be hidden fo arrays
     * 
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
