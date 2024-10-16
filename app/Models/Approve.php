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

    // Phương thức này giúp Eloquent có thể xử lý khóa chính phức hợp khi save
    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if (!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($keys as $keyName) {
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    // Phương thức này xử lý việc lấy key đúng
    protected function getKeyForSaveQuery($keyName = null)
    {
        if (is_null($keyName)) {
            $keyName = $this->getKeyName();
        }

        return $this->getAttribute($keyName);
    }

    public function class() {
        return $this->belongsTo(Class1::class, 'class_id', 'class_id');
    }

    public function tutor() {
        return $this->belongsTo(Tutor::class, 'tt_id', 'tt_id');
    }
}
