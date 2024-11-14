<?php

namespace App\Integrations\Asaas\Interface;

use Illuminate\Database\Eloquent\Model;

interface AssasDtoInterface
{
    public function toArray(): array;

    public static function buildFromModel(Model $model);
}
