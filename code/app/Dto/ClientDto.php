<?php

namespace App\Dto;

use App\Http\Requests\CreateClient;
use App\Interfaces\BuildFromRequest;
use App\Interfaces\ToArray;
use Illuminate\Foundation\Http\FormRequest;

class ClientDto implements BuildFromRequest, ToArray
{
    protected string $name;
    protected string $email;
    protected string $document;

    public function __construct(string $name, string $email, string $document)
    {
        $this->name = $name;
        $this->email = $email;
        $this->document = $document;
    }

    public static function buildFromRequest(FormRequest $request): ClientDto
    {
        $data = $request->validated();
        return new self(
            name: $data['name'],
            email: $data['email'],
            document: $data['document']
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'document' => $this->document
        ];
    }
}
