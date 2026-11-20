<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'user_nm',
        'pass_wd',
        'time_log',
    ];

    protected $hidden = [
        'pass_wd',
    ];

    // Memberi tahu Auth / Hash bahwa kolom password bernama pass_wd
    public function getAuthPassword()
    {
        return $this->pass_wd;
    }
}