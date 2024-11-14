<?php

namespace App\Enums;

enum PaymentType: string
{
    case PIX = 'PIX';
    case BOLETO = 'BOLETO';

    public static function toArray(): array
    {
        return [
            self::PIX->value,
            self::BOLETO->value,
        ];
    }

    public static function getOptions()
    {
        return [
            self::PIX->value => 'Pix',
            self::BOLETO->value => 'Boleto',
        ];
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::PIX => 'PIX',
            self::BOLETO => 'Boleto',
        };
    }
}
