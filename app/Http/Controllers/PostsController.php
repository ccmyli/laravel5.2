<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Gate;
use App\User;
use App\Post;
use App\Models\UserAccount;
class PostsController extends Controller
{
    public function show($id)
    {	
    	auth()->loginUsingId(1);
    	//auth()->logout();
    	//dd(Auth::user()->id);
    	$post = Post::findOrFail($id);
    	//第一种方法Gate::denies或allows
    	// if(Gate::denies('show-post',$post)){
    	// 	abort(403,'没有权限');
    	// }
    	//第二种方法 在父类里面
    	//$this->authorize('show-post',$post);
    	//第三种方法 can or cannot
    	if(!auth()->user()->can('update',$post)){
    		abort(403,'没有权限');
    	}
 

    	return view('post.show',compact('post'));
    }

    public function index(){
        
        /*
        $account = User::find(1)->account->toArray();
        dd($account);
        array:7 [▼
          "id" => 2
          "user_id" => 1
          "qq" => "23456"
          "weixin" => "test"
          "weibo" => "test"
          "created_at" => "2016-10-07 00:00:00"
          "updated_at" => "2016-10-19 00:00:00"
        ]*/
        $user = UserAccount::with('user')->get()->toArray();
        dd($user);
    }
}
