<?php

namespace App\Models;

use App\Enums\EquipmentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => EquipmentType::class,
    ];

    protected $fillable = [
        'name', 'type', 'serial_number', 'device_address', 'make', 'model', 'status',
    ];

    public static $permissions = [
        'create' => 'equipment:create',
        'read' => 'equipment:read',
        'delete' => 'equipment:delete',
        'edit' => 'equipment:edit',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

}
