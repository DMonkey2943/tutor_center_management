<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';
    protected $fillable = ['level_name',];
    protected $guarded = ['level_id'];

    protected $primaryKey = 'level_id';
    
    public $timestamps = false;

    public function tutors()
    {
        return $this->hasMany(Tutor::class, 'level_id', 'level_id');
    }

    public function classes()
    {
        return $this->hasMany(Class1::class, 'class_level', 'level_id');
    }
}
