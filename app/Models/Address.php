<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $fillable = ['addr_detail', 'ward_id'];
    protected $guarded = ['addr_id'];

    protected $primaryKey = 'addr_id';

    public $timestamps = false;

    public function ward() {
        return $this->belongsTo(Ward::class, 'ward_id', 'ward_id');
    }

    public function class()
    {
        return $this->hasOne(Class1::class, 'class_address', 'addr_id');
    }
}
