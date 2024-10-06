<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    protected $fillable = ['subject_name',];
    protected $guarded = ['subject_id'];

    protected $primaryKey = 'subject_id';
    
    public $timestamps = false;

    public function tutors()
    {
        return $this->belongsToMany(Tutor::class, 'tutor_subjects', 'tt_id', 'subject_id');
    }

    public function classes()
    {
        return $this->belongsToMany(Class1::class, 'class_subjects', 'class_id', 'subject_id');
    }
}
