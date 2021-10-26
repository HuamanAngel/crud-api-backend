<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;// Indica que vamos a usar
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'codeArticle'=>'required|string|min:0|unique:articles,art_code',
            'nameArticle'=>'required|string|min:0',
            'quantityArticle'=>'required|integer|between:0,1000',
            'categorieArticle'=>'required|in:Zapatos,Mochilas,Vestidos,Camisas'
        ];
    }
}
