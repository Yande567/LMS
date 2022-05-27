<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueHistory extends Model
{
    use HasFactory;

    protected $fillable = [
       'book_id',
       'user_id',
       'status',
       'issue_date',
       'return_date',
    ];
    
    protected $casts = [
        'id' => 'integer',
        'book_id' => 'integer',
        'user_id' => 'integer',
        'issue_date' => 'date',
        'return_date' => 'date',
    ];
}
