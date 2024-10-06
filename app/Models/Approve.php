<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approve extends Model
{
    use HasFactory;

    protected $table = 'approve';
    protected $fillable = ['class_id', 'tt_id', 'status',];
    // protected $guarded = ['class_id', 'tt_id',];

    protected $primaryKey = ['class_id', 'tt_id',];
    public $incrementing = false; // Vô hiệu hóa tính năng auto-increment (vì khóa chính không tự động tăng)

    public $timestamps = true;
}
