<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Charge extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'amount',
        'status',
        'due_date',
        'payment_type',
        'external_id',
        'payment_url'
    ];

    protected $dates = [
        'due_date',
    ];


    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

}
