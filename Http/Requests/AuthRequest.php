<?php
namespace Hydra\Http\Requests;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "email"     => "required",
            "password"  => "required"
        ];
    }

    public function messages() {
        return [];
    }

}