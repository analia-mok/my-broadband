<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUsage extends Model
{
    use HasFactory;

    public $fillable = [
        'data',
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
