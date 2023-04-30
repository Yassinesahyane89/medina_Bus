<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'line_id', 'station_id', 'direction', 'arrival_time', 'departure_time',
    ];

    public function line()
    {
      return $this->belongsTo(Line::class);
    }

    public function station()
    {
      return $this->belongsTo(Station::class);
    }
}
