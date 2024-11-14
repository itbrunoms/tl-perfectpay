<?php

namespace App\Enums;

enum PaymentType: string
{
    case PIX = 'PIX';
    case BOLETO = 'BOLETO';
    case CREDIT_CARD = 'CREDIT_CARD';

    public static function toArray(): array
    {
        return [
            self::PIX->value,
            self::BOLETO->value,
            self::CREDIT_CARD->value,
        ];
    }

    public static function getOptions()
    {
        return [
            self::PIX->value => 'Pix',
            self::BOLETO->value => 'Boleto',
            self::CREDIT_CARD->value => 'Cartão',
        ];
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::PIX => 'PIX',
            self::BOLETO => 'Boleto',
            self::CREDIT_CARD => 'Cartao',
        };
    }
}
