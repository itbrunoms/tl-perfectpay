<?php

namespace App\Enums;

enum StatusOfChange: string
{
    case PENDING = 'pending';
    case CREATED = 'created';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case CANCELLED = 'cancelled';

    public function getLabel()
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::CREATED => 'Criado',
            self::APPROVED => 'Aprovado',
            self::REJECTED => 'Rejeitado',
            self::CANCELLED => 'Cancelado',
        };
    }

    public static function toArray()
    {
        return [
            self::PENDING->value,
            self::CREATED->value,
            self::APPROVED->value,
            self::REJECTED->value,
            self::CANCELLED->value,
        ];
    }
}
