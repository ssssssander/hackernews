<?php

namespace App\Http\Requests;

use App\Http\Requests\StoreCommentRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends StoreCommentRequest
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
        return parent::rules();
    }
}
