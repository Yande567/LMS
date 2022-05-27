<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'ISBN_number',
        'book_title',
        'author_fname',
        'author_lname',
        'edition',
        // "number_of_copies" refers to the total number of copies that were registered in the lib
        'number_of_copies',
        'publish_date',
        'publisher',
        'created_by',
    ];

    protected $casts = [
        'id' => 'integer',
        'publish_date' => 'datetime',
        'created_by' => 'integer',
    ];
}
