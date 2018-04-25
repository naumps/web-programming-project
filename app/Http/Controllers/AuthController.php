<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateSecretRequest;
use App\Provider;
use App\ProviderUser;
use App\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use \Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Cache;


class AuthController extends Controller
{
    public $redirectTo = '/movies';

    public function redirectToProvider($provider)
    {

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider){
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user,$provider);
        Auth::login($authUser,true);
        return redirect(route('movies'));
    }


    public function findOrCreateUser($user,$provider){

        $authUser = ProviderUser::where('user_provider_id','=',$user->id)->first();
        if($authUser){
            return User::where('id','=',$authUser->user_id)->first();
        }


        $providerToAttach = Provider::where('name','=',$provider)->first();
        if(!$providerToAttach){

            $providerToAttach = Provider::create(['name'=>$provider]);
        }

        $newUser = User::where('email','=',$user->email)->first();
        if(!$newUser){

            $newUser = User::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'password'=>bcrypt($user->id),
                'role'=>'user',
            ]);

        }


        $newUser->providers()->attach($providerToAttach,['user_provider_id'=>$user->id]);

        return $newUser;
    }

    public function authenticated(Request $request){

        if(auth()->user()->google2fa_secret){
            Auth::logout();
            $request->session()->put('2fa:user:id', auth()->id);

            return redirect('2fa/validate');
        }
        return redirect()->intended($this->redirectTo);


    }


    public function getValidateToken()
    {
        if (session('2fa:user:id')) {
            return view('2fa.validate');
        }

        return redirect('login');
    }


    public function postValidateToken(ValidateSecretRequest $request)
    {
        //get user id and create cache key
        $userId = $request->session()->pull('2fa:user:id');
        $key    = $userId . ':' . $request->totp;

        //use cache to store token to blacklist
        Cache::add($key, true, 4);

        //login and redirect user
        Auth::loginUsingId($userId);

        return redirect()->intended($this->redirectTo);
    }

    public function confirmTwoFactor(){
        $user = auth()->user();
        if (session('2fa:user:id')) {
            return view('2fa.validate');
        }
        auth()->logout();
        $email= $user->email;
        return redirect(route('login',compact('email')));
    }



}
