<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
  
class EventModel extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'title', 'startdate','enddate','recurrence_type','recurrence_time'
    ];
}