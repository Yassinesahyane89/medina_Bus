<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasFactory;

    protected $fillable = [
      'bus_id', 'code', 'start_station_id', 'end_station_id', 'departure_time', 'arrival_time', 'distance_km',
    ];

    public function bus()
    {
      return $this->belongsTo(Bus::class);
    }

    public function start_station()
    {
      return $this->belongsTo(Station::class, 'start_station_id');
    }

    public function end_station()
    {
      return $this->belongsTo(Station::class, 'end_station_id');
    }

    public function schedules()
    {
      return $this->hasMany(Schedule::class);
    }
}
