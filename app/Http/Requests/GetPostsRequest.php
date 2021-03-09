<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetPostsRequest extends FormRequest
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
            //
        ];
    }

    public function getSort()
    {
        return in_array($this->input('sort'), ['asc', 'desc']) ? $this->input('sort') : 'desc';
    }
}
