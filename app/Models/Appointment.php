<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'date', 'time', 'status'];

    protected $casts = [
        'date' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getStatusBadgeClassAttribute()
    {
        return $this->status === 'active' ? 'success' : 'danger';
    }

    public function getStatusTextAttribute()
    {
        return $this->status === 'active' ? 'Đã đặt' : 'Đã hủy';
    }
}