<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
      /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
        //return [
            
            'name' => 'required|min:1|max:255',
            'filter' => 'required|unique:portfolios|min:1|max:255',
            'images' => 'required|unique:portfolios',
        ], $messages);
    }     
    }
    
    /*
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //'required' => 'Field :attribute required',
            //'unique' => 'Field :attribute unique' ,
            'name' => 'The :attribute value is required :input is not between 1:min - 255:max.',
            'filter'  => 'The :attribute value :input is unique and not between 1:min - 255:max.',
        ];
    }
}
