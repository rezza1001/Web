<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReservationRequest extends Request
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
          'name'       => 'required|min:3|max:255',
          'email'      => 'required|email|max:255',
          'phone'      => 'required|min:3|max:255',
          'address'    => 'required|min:3',
          'ktp'    => 'max:1000',
          'npwp'    => 'max:1000',
        ];
    }
}
