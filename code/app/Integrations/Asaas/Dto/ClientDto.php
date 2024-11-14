<?php

namespace App\Integrations\Asaas\Dto;

use App\Integrations\Asaas\Interface\AssasDtoInterface;
use Illuminate\Database\Eloquent\Model;

class ClientDto implements AssasDtoInterface
{

    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public string $document
    )
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'document' => $this->document
        ];
    }

    public static function buildFromModel(Model $model)
    {
        return new self(
            $model->client()->external_id,
            $model->name,
            $model->email,
            $model->document
        );
    }
}
