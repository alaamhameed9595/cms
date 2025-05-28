<?php

namespace App\Http\Requests\Auth\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'title' => 'required|string|max:255',
            'description' => 'required|string|min:20',
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048,dimensions:min_width=496,min_height=503',

        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'category_id.required' => 'The category field is required.',
            'file.required' => 'The file field is required.',
            'file.image' => 'The file must be an image.',
            'file.mimes' => 'The file must be a file of type: jpeg, png, jpg, gif, svg.',
            'file.max' => 'The file may not be greater than 2048 kilobytes.',
            'file.dimensions' => 'The image dimensions are not valid.',
        ];
    }
}
