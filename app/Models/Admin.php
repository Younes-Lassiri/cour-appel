<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'admin_name',
        'email',
        'role',
        'status',
        'password'
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    

}
