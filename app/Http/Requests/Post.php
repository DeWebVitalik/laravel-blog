<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Post extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:200',
            'content' => 'required',
            'category_id'=>'required',
            'file' => 'max:2048',
        ];
    }
}
