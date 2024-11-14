<?php

namespace App\Models;

use App\Enums\StatusOfChange;
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
        'payment_url',
        'encoded_image',
        'payload'
    ];

    protected $dates = [
        'due_date',
    ];

    public $appends = [
        'label_status',
        'payment_page'
    ];

    public function getLabelStatusAttribute(): string
    {
        return StatusOfChange::from($this->status)->getLabel();
    }

    public function getPaymentPageAttribute(): string
    {
        return strtolower($this->payment_type);
    }

    public
    function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

}
