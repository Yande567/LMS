<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'book_title',
        'number_of_availible_copies',
    ];

    protected $casts = [
        'id' => 'integer',
        'book_id' => 'integer',
        'number_of_availible_copies' => 'integer',
    ];
}
