<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jenis()
    {
        return $this->belongsTo(JenisAduan::class, 'type');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function response()
    {
        return $this->hasMany(TanggapanAduan::class, 'aduan');
    }
}
