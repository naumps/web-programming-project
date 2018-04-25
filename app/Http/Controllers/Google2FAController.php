<?php

namespace App\Http\Controllers;

use Crypt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use \ParagonIE\ConstantTime\Base32;
use  \PragmaRX\Google2FALaravel\Google2FA;

class Google2FAController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('web');
    }

    public function index(){

        return view('2fa.index');
    }

    public function enableTwoFactor(Request $request)
    {

        //generates new secret
        $fa = app('pragmarx.google2fa');
        $secret = $fa->generateSecretKey();


        //get user
        $user = $request->user();
        $user->google2fa_secret = encrypt($secret);
        $user->save();
        //generates image for QR barcode

        $imageDataUri = $fa->getQRCodeInline(
            $request->getHttpHost(),
            $user->email,
            $secret,
            200
        );

        return view('2fa.enableTwoFactor', ['image' => $imageDataUri, 'secret' => $secret]);

    }

    public function disableTwoFactor(Request $request)
    {

        $user = auth()->user();

        $user->google2fa_secret = null;
        $user->save();

        return view('2fa.disableTwoFactor');
    }



}






















