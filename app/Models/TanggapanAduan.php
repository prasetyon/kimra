<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanggapanAduan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Aduan::class, 'aduan');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function file()
    {
        return $this->hasMany(FileAduan::class, 'aduan');
    }
}
