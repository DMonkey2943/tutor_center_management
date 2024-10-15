<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Approve extends Pivot
{
    use HasFactory;

    protected $table = 'approve';
    protected $fillable = ['class_id', 'tt_id', 'status',];
    // protected $guarded = ['class_id', 'tt_id',];

    protected $primaryKey = ['class_id', 'tt_id',];
    public $incrementing = false; // Vô hiệu hóa tính năng auto-increment (vì khóa chính không tự động tăng)

    public $timestamps = true;

    public function class() {
        return $this->belongsTo(Class1::class, 'class_id', 'class_id');
    }

    public function tutor() {
        return $this->belongsTo(Tutor::class, 'tt_id', 'tt_id');
    }
}
