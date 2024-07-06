<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Client extends Model
{
    use HasFactory, LogsActivity;
    
    protected $fillable = [
        'user_id', 
        'name',
        'email',
        'phone_number',
    ];

    /**
     * Get the options for logging activity.
     *
     * @return \Spatie\Activitylog\LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->useLogName('Client')
            ->setDescriptionForEvent(fn(string $eventName) => "Client has been {$eventName}")
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'client_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
