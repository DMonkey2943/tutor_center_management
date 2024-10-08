<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Class1 extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $fillable = ['class_num_of_students', 'class_num_of_sessions', 'class_time', 
                           'class_gender_tutor', 'class_request',
                           'class_tuition',  'class_status', 
                           'class_address', 'class_grade', 'class_level', 
                           'class_tutor', 'class_parent',
                          ];
    protected $guarded = ['class_id'];

    protected $primaryKey = 'class_id';

    public function address() {
        return $this->belongsTo(Address::class, 'class_address', 'addr_id');
    }

    public function grade() {
        return $this->belongsTo(Grade::class, 'class_grade', 'grade_id');
    }

    public function level() {
        return $this->belongsTo(Level::class, 'class_level', 'level_id');
    }

    public function tutor() {
        return $this->belongsTo(Tutor::class, 'class_tutor', 'tt_id');
    }

    public function parent() {
        return $this->belongsTo(Parent1::class, 'class_parent', 'pr_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'class_subjects', 'class_id', 'subject_id');
    }

    public function tutorList() {
        return $this->belongsToMany(Tutor::class, 'approve', 'class_id', 'tt_id')
            ->using(Approve::class)->withPivot('status', 'created_at', 'updated_at');
    }
}
