<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            // 'file' => ['required', 'image' , 'mimes:jpg,png'],
            'title' => ['required' , 'string' , 'max:255'],
            'description' => ['required' , 'string' , 'max:3000'],
            'status' =>['required','integer'],
            'category' => ['required' , 'integer'],
            'tags' => ['required' , 'array'],
            'tags.*' => ['required']
        ];
    
    }
}
