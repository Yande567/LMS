<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suggestBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'isbn',
        'category',
        'suggested_by',
    ];


}