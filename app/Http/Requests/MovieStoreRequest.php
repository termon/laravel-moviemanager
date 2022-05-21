<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class MovieStoreRequest extends FormRequest
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
        return [
            'name' => 'required|max:100',
            'director' => 'required|max:100',
            'year' => 'numeric|between:1900,' . Carbon::now()->year,
            'budget' => 'numeric|between:0,300',
            'duration' => 'numeric|between:1,300',
            'genre' => 'required',
            'cast' => 'required|max:300',
            'plot' => 'required|max:1000',
            'rating' => 'integer|between:0,5',
            'poster_url' => ['required',new \App\Rules\UrlValidator]
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The movie name is required!!!!!',
            'director.required' => 'You must specify the director name',
            'password.required' => 'Password is required!'
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'name' => 'trim|capitalize|escape',
            'director' => 'trim|capitalize|escape',
            'cast' => 'trim|capitalize|escape'
        ];
    }

}
