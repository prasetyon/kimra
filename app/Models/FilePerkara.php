<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePerkara extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function perkara()
    {
        return $this->belongsTo(PerkaraHukum::class, 'perkara');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
