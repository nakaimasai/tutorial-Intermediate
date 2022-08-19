<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReview extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'gender' => 'required',
            'select' => 'required',
            'mail' => 'required|email:filter,dns',
            'stars' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'name' => '氏名',
            'gender' => '性別',
            'select' => '年代',
            'mail' => 'メールアドレス',
            'stars' => '評価',
        ];
    }
}
