<?php

namespace App\Integrations\Asaas\Interface;

interface RequestAssasInterface
{
    public function build(array $data): void;

    public function send();
}
