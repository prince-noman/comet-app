<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;

class Admin extends User {
    use HasFactory, Notifiable;

    protected $guarded = [];

    //Get user role
    public function role() {
        return $this->belongsTo( Role::class, 'role_id', 'id' );
    }
}