<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'naziv_rada',
        'naziv_rada_eng',
        'zadatak_rada',
        'tip_studija',
        'user_id',
        'users',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function users()
{
    return $this->belongsToMany(User::class);
}

}
