<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTinjut extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(TemuanTinjut::class, 'tinjut');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function file()
    {
        return $this->hasMany(FileTinjut::class, 'tinjut');
    }
}
