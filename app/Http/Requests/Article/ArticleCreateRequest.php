<?php

namespace App\Http\Requests\Article;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Input;

class ArticleCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasRole('editor');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:articles,title',
            'slug' => 'required|unique:articles,slug',
            'category' => 'required',
            'author_id' => 'required',
            'content' => 'required',
        ];
    }

    public function getValidRequest()
    {
        return [
            'author_id' => $this->input('author_id'),
            'category_id' => $this->input('category'),
            'slug' => $this->input('slug'),
            'title' => $this->input('title'),
            'subtitle' => $this->input('subtitle'),
            'content' => $this->input('content'),
            'article_image' => $this->input('article_image'),
            'meta_keywords' => $this->input('meta_keywords'),
            'meta_description' => $this->input('meta_description'),
            'is_published' => $this->input('is_published') ?? false,
            'published_at' => $this->input('published_at'),
        ];
    }

}
