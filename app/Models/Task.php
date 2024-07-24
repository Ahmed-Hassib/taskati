<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_name',
        'start_date',
        'end_date',
        'is_done'
    ];

    protected $with = [
        'user'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = (new Carbon($value))->format('Y-m-d');
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = (new Carbon($value))->format('Y-m-d');
    }

    public function getStartDateAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }

    public function getEndDateAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }

    public function getCreatedAtAttribute($value)
    {
        return !is_null($value) ? (new Carbon($value))->format('h:ia d-m-Y') : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return !is_null($value) ? (new Carbon($value))->format('h:ia d-m-Y') : null;
    }
}
