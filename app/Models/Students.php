<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id',
       'student_id',
       'first_name',
       'last_name',
       'gender',
       'contact',
       'school',
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'student_id' => 'string',
    ];

    public function studentInformation()
    {
        return $this->belongsTo(User::class);
    }
}
