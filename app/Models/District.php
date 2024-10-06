<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';
    protected $fillable = ['district_name',];
    protected $guarded = ['district_id'];

    protected $primaryKey = 'district_id';
    
    public $timestamps = false;

    public function wards()
    {
        return $this->hasMany(Ward::class, 'district_id', 'district_id');
    }

    public function tutors()
    {
        return $this->belongsToMany(Tutor::class, 'tutor_districts', 'tt_id', 'district_id');
    }
}
