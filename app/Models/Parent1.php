<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parent1 extends Model
{
    use HasFactory;

    protected $table = 'parents';
    protected $fillable = ['pr_gender', 'user_id',];
    protected $guarded = ['pr_id'];

    protected $primaryKey = 'pr_id';
    
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function classes()
    {
        return $this->hasMany(Class1::class, 'class_parent', 'pr_id');
    }
}
