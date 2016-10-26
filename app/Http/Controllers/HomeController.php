<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Jobs\PurchasePodcastCommand;
use App\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request=\Illuminate\Http\Request::create('home','GET',['name'=>'xzl','age'=>24]);
        var_dump($request->toArray());
       // $user=Auth::loginUsingId(1);
       $this->dispatch(PurchasePodcastCommand::class,$request);
        //$this->dispatch(new PurchasePodcastCommand(User::find(6),4));
       // return view('home');
    }
}
