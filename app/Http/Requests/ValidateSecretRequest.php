<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\User;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Factory as ValidatonFactory;
use PragmaRX\Google2FA\Google2FA;


class ValidateSecretRequest extends FormRequest
{

    private $user;

    public function __construct(ValidatonFactory $factory)
    {
        $factory->extend(
          'valid_token',
          function ($attribute, $value,$parameters ,$validator){
              $secret = decrypt($this->user->google2fa_secret);
              $fa = app('pragmarx.google2fa');
              return $fa->verifyKey($secret,$value);
          },
          'Not a valid token'
        );


        $factory->extend(
            'used_token',
            function ($attribute, $value, $parameters, $validator) {
                $key = $this->user->id . ':' . $value;



                return !\cache()->has($key);
            },
            'Cannot reuse token'
        );

    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        try {
            $this->user = User::findOrFail(
                session('2fa:user:id')
            );
        } catch (Exceptionion $exc) {
            return false;
        }

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
            'totp' => 'bail|required|digits:6|valid_token|used_token',
        ];
    }
}
