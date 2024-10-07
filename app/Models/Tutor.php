<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tutor extends Model
{
    use HasFactory;

    protected $table = 'tutors';
    protected $fillable = ['tt_gender', 'tt_birthday', 
                           'tt_address', 'tt_major', 'tt_school',
                           'tt_avatar', 'tt_degree',
                           'tt_experiences', 'tt_status', 
                           'level_id', 'tuition_id', 'user_id',
                          ];
    protected $guarded = ['tt_id'];

    protected $primaryKey = 'tt_id';
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function level() {
        return $this->belongsTo(Level::class, 'level_id', 'level_id');
    }

    public function tuition() {
        return $this->belongsTo(Tuition::class, 'tuition_id', 'tuition_id');
    }

    public function districts()
    {
        return $this->belongsToMany(District::class, 'tutor_districts', 'tt_id', 'district_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'tutor_subjects', 'tt_id', 'subject_id');
    }

    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'tutor_grades', 'tt_id', 'grade_id');
    }

    public function classes()
    {
        return $this->hasMany(Class1::class, 'class_tutor', 'tt_id');
    }

    public function classList() {
        return $this->belongsToMany(Class1::class, 'approve', 'class_id', 'tt_id')
            ->using(Approve::class)->withPivot('status', 'created_at', 'updated_at');
    }
}
