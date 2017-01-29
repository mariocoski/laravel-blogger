<?php

namespace App\Http\Requests\Category;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('categories', 'name')],
            'slug' => ['required', Rule::unique('categories', 'slug')],
        ];
    }

    public function getValidRequest()
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }

}
