<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $timestamps = false;
    
    protected $primaryKey = 'id';
    protected $guarded = 'id';
    protected $table = 'schedule';

    protected $fillable = [
        'schedule_for',
        'Nama_Kegiatan',
        'name',
        'instructor_id',
    ];
}
