<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class SubscriptionController extends Controller
{
    public function index(){

        return view('subscriptions.index');
    }

    public function changePlan(){

        $plan = auth()->user()->getPlan();

        return view('subscriptions.changePlan',compact('plan'));
    }

    public function storeBasic(){

        $user = auth()->user();
        if(!$user->hasRole('subscriber')){
            $stripeToken = request()->get('stripeToken');
            $user->newSubscription('basic','Basic: Acc')->create($stripeToken);
            $user->update(['role'=>'subscriber']);

        }else{
            return redirect(route('already_subscribed'));
        }

        return redirect(route('movies'));
    }

    public function storeRegular(){
        $user = auth()->user();
        if(!$user->hasRole('subscriber')){
            $stripeToken = request()->get('stripeToken');
            $user->newSubscription('regular','Regular: Acc')->create($stripeToken);
            $user->update(['role'=>'subscriber']);
        }else{
            return redirect(route('already_subscribed'));
        }

        return redirect(route('movies'));
    }

    public function storePremium(){
        $user = auth()->user();
        if(!$user->hasRole('subscriber')){
            $stripeToken = request()->get('stripeToken');
            $user->newSubscription('premium','Premium: Acc')->create($stripeToken);
            $user->update(['role'=>'subscriber']);
        }else{
            return redirect(route('already_subscribed'));
        }

        return redirect(route('movies'));
    }

    public function alreadySubscriber(){
        return view('subscriptions.youAreSubscriber');
    }

    public function storeChangedPlan(){
        $user = auth()->user();
        $plan = request()->get('plan');
        $usersPlan=$user->getPlan();
        $user->subscription($usersPlan[0])->swap($plan);
        $name = strtolower(explode(":",$plan)[0]);
        $subscription = $user->subscriptions;

        $subscription[0]->update(['name'=>$name]);
        return redirect(route('change_plan'));
    }

    public function cancelSubscription(User $user){

        $user = auth()->user();

        if($user->subscription('basic')){

            $user->subscription('basic')->cancel();
        }elseif($user->subscription('regular')){
            $user->subscription('regular')->cancel();
        }elseif($user->subscription('premium')){
            $user->subscription('premium')->cancel();
        }
        $user->update(['role'=>'user']);

        return redirect(route('movies'));
    }
}



















