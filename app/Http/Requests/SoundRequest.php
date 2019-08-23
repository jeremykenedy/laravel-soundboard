<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoundRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasPermission('perms.super.admin') || $this->user()->hasPermission('perms.admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'     => 'required|string|min:3|max:255',
            'enabled'   => 'required|boolean',
            'file'      => 'required|string|min:12|max:255',
        ];
    }
}
