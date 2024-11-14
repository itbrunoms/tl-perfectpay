<?php

namespace App\Interfaces;

use Illuminate\Foundation\Http\FormRequest;

interface BuildFromRequest
{
    public static function buildFromRequest(FormRequest $request): self;
}
