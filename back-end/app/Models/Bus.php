<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = [
      'brand', 'purchase_date', 'passenger_capacity',
    ];

    public function lines()
    {
      return $this->hasMany(Line::class);
    }
}
