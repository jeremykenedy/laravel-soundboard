<?php

namespace App\Http\Requests;

use App\Http\Requests\SoundAdminRequest;

class SoundRequest extends SoundAdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'     => 'required|string|min:3|max:255|unique:sounds,title,'.$this->sound,
            'enabled'   => 'required|boolean',
            'file'      => 'required|string|min:12|max:255',
        ];
    }
}
