<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'brand', 'room_id', 'status'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class);
    }

    public static function boot()
    {
        parent::boot();

        // Event to synchronize status with related work orders
        static::updated(function ($device) {
            $statusMap = [
                'completed' => 'active',
                'pending' => 'inactive',
                'in_progress' => 'maintenance',
                'unread' => 'reporting',
            ];

            if (array_key_exists($device->status, $statusMap)) {
                $device->workOrders()->update(['status' => $statusMap[$device->status]]);
            }
        });
    }
}
