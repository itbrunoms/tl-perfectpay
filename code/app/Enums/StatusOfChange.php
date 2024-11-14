<?php

namespace App\Enums;

use function Laravel\Prompts\select;

enum StatusOfChange: string
{
    case PENDING = 'pending';
    case CREATED = 'created';
    case APPROVED = 'approved';
    case RECEIVED = 'received';
    case RECEIVED_IN_CASH = 'received_in_cash';
    case REJECTED = 'rejected';
    case CANCELLED = 'cancelled';

    public function getLabel()
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::CREATED => 'Criado',
            self::APPROVED => 'Aprovado',
            self::REJECTED => 'Rejeitado',
            self::RECEIVED => 'Recebido',
            self::RECEIVED_IN_CASH => 'Recebido em Dinheiro',
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
            self::RECEIVED->value,
            self::RECEIVED_IN_CASH->value,
            self::CANCELLED->value,
        ];
    }
}
