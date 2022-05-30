<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'student_infos';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'last_name',
        'contact',
        'gender',
        'student_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\student', 'student_id');
    }
}
