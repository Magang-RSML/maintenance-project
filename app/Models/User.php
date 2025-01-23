<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'email', 'level'];

    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class);
    }
}