<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peserta extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }
}
