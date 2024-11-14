<?php

namespace App\Http\Requests;

use App\Enums\PaymentType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCharge extends FormRequest
{
    public function rules(): array
    {
        return [
            'client_id' => ['required', 'int', 'exists:clients,id'],
            'amount' => ['required', 'numeric'],
            'due_date' => ['required', 'date', 'after:today'],
            'payment_type' => ['required', 'string', Rule::in(PaymentType::toArray())]
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => 'O campo cliente é obrigatório',
            'client_id.int' => 'O campo cliente deve ser um número inteiro',
            'client_id.exists' => 'O cliente informado não existe',
            'amount.required' => 'O campo valor é obrigatório',
            'amount.numeric' => 'O campo valor deve ser um número',
            'due_date.required' => 'O campo data de vencimento é obrigatório',
            'due_date.date' => 'O campo data de vencimento deve ser uma data',
            'due_date.after' => 'O campo data de vencimento deve ser uma data futura',
            'payment_type.required' => 'O campo forma de pagamento é obrigatório',
            'payment_type.string' => 'O campo forma de pagamento deve ser uma string',
            'payment_type.in' => 'O campo forma de pagamento deve ser um dos valores: ' . implode(', ', PaymentType::toArray())
        ];
    }
}
