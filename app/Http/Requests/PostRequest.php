<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
            'title' => [
                'required',
                Rule::unique('posts', 'title')->ignore($this->post)
            ],
            'category_id'   => 'required',
            'content'       => 'required',
            'thumbnail'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'tags'          => 'required|array',
            'status'        => 'required'
        ];
    }
}
