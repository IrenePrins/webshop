<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            //
            'title' => 'required',
            'description' => 'required',
            'price' => ['required', 'numeric'],
            'category' => 'required',
            'image' => 'image|required|max:1999'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Please, fill in the name',
            'description.required' => 'Please, fill in the description',
            'price.required' => 'Please, fill in the price',
            'category.required' => 'Please, choose a category',
            'image.image' => 'Please, upload a image',
            'image.required' => 'Please, upload a image'
        ];
    }
}
