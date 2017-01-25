<?php

namespace App\Http\Requests;

use Auth;
use App\Article;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends StoreArticleRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // $article_id = $this->route('edit_article');
        // return Article::where('id', $article_id)->where('user_id', Auth::id())->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return parent::rules();
    }
}
