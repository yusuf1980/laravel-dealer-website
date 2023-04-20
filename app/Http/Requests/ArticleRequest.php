<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2|max:190',
            'slug' => 'max:190|unique:articles,slug,'.\Request::get('id'),
            'icon' => 'max:190',
            'content' => 'required|min:2',
            'date' => 'required|date',
            //'status' => 'required',
            'category_id' => 'required',
            'meta_title' => 'max:190',
            'meta_keyword' => 'max:190',
            'meta_description' => 'max:250',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
