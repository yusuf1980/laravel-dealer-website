<?php

namespace App\Http\Requests;

//use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class MediaRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
        $rules = [
            'title' => 'required|min:2|max:190',
            //'product_id' => 'required',
            'template' => 'required',
            //'content' => 'required',
            //'variants' => 'numeric',
        ];

        /*foreach($this->request->get('variants') as $key => $val)
        {
            $rules['variants.'.$key] = 'numeric';
        }*/

        return $rules;
    }
}
