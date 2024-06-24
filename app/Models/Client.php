<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 
        'name',
        'email',
        'phone_number',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'client_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
