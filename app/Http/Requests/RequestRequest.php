<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'price' => ['required', 'numeric'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'  => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'price' => 'Цена',
        ];
    }
}
