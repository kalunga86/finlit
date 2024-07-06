<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity as SpatieActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends SpatieActivity
{
    use HasFactory;

    /**
     * Get the user that caused the activity.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }
}