<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MenuRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => 'required|min:2|max:99',
            'type' => 'required',
            'icon' => 'required|max:190',
            'link' => 'max:190'
        ];
    }
}
