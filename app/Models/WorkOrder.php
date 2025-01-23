<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'room_id', 'device_id', 'requested_date', 'status', 'issue_description', 'notes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public static function boot()
    {
        parent::boot();

        // Event to synchronize status with related device
        static::updated(function ($workOrder) {
            $statusMap = [
                'completed' => 'active',
                'pending' => 'inactive',
                'in_progress' => 'maintenance',
            ];

            if (array_key_exists($workOrder->status, $statusMap)) {
                $workOrder->device()->update(['status' => $statusMap[$workOrder->status]]);
            }
        });
    }
}
