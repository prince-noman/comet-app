<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;

class Admin extends User {
    use HasFactory;

    protected $guarded = [];

    //Get user role
    public function role() {
        return $this->belongsTo( Role::class, 'role_id', 'id' );
    }
}