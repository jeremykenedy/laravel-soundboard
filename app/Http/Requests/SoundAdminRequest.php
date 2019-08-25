<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoundAdminRequest extends FormRequest
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
}
