<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupPut extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:128'],
            'description' => ['required', 'max:518'],
            'userIds' => ['required', 'array'],
            'userIds,*' => ['int'],
        ];
    }
}
