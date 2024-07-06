<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Wallet extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'user_id', 
        'amount', 
        'date_from', 
        'date_to'
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
            ->useLogName('Wallet')
            ->setDescriptionForEvent(fn(string $eventName) => "Wallet has been {$eventName}")
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

}
