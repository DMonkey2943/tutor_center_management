<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';
    protected $fillable = ['grade_name',];
    protected $guarded = ['grade_id'];

    protected $primaryKey = 'grade_id';
    
    public $timestamps = false;

    public function tutors()
    {
        return $this->belongsToMany(Tutor::class, 'tutor_grades', 'tt_id', 'grade_id');
    }

    public function classes()
    {
        return $this->hasMany(Class1::class, 'class_grade', 'grade_id');
    }

}
