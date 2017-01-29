<?php

namespace App\Http\Requests\Tag;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagUpdateRequest extends FormRequest
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
            'name' => ['required', Rule::unique('tags', 'name')->ignore($this->name, 'name')],
            'slug' => ['required', Rule::unique('tags', 'slug')->ignore($this->slug, 'slug')],
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
