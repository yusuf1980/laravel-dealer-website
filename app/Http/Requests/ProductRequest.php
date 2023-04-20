<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'slug' => 'max:190|unique:products,slug,'.\Request::get('id'),
            //'content' => 'required|min:2',
            'date' => 'required|date',
            //'status' => 'required',
            'category_id' => 'required',
            'brocure' => 'max:190',
            //'header' => 'max:190',
            'meta_title' => 'max:190',
            'meta_keyword' => 'max:190',
            'meta_description' => 'max:250',
            //'price' => 'required|numeric|min:1000',
            //'price_old' => 'numeric',
            //'image' => 'mimes:jpeg,png'
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
