<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryOrder extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
    
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}