<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'quantity', 'category'];

    public function getStockStatusAttribute()
    {
        if ($this->quantity == 0) {
            return 'Hết hàng';
        } elseif ($this->quantity < 5) {
            return 'Sắp hết hàng';
        }
        return 'Còn hàng';
    }

    public function getStockBadgeClassAttribute()
    {
        if ($this->quantity == 0) {
            return 'danger';
        } elseif ($this->quantity < 5) {
            return 'warning';
        }
        return 'success';
    }
}