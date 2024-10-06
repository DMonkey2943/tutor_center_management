<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tuition extends Model
{
    use HasFactory;

    protected $table = 'tuitions';
    protected $fillable = ['tuition_range',];
    protected $guarded = ['tuition_id'];

    protected $primaryKey = 'tuition_id';

    public $timestamps = false;

    public function tutors()
    {
        return $this->hasMany(Tutor::class, 'tuition_id', 'tuition_id');
    }
}
