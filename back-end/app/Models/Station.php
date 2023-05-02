<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
      'code', 'name', 'address',
    ];

    public function start_lines()
    {
      return $this->hasMany(Line::class, 'start_station_id');
    }

    public function end_lines()
    {
      return $this->hasMany(Line::class, 'end_station_id');
    }

    public function schedules()
    {
      return $this->hasMany(Schedule::class);
    }
}
