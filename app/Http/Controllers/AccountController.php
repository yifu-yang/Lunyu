<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;


class AccountController extends controller
{
    private $authClient;
    private $weiboClient;

    public function __construct()
    {
        //init conreoller
        $this->authClient = new \SaeTOAuthV2( env('WB_AKEY') , env('WB_SKEY'));
    }

    public function index()
    {
        $code_url = $this->authClient->getAuthorizeURL( env('WB_CALLBACK_URL') );
        return view('welcome',compact('code_url'));
    }

    public function callback()
    {
        $code = Input::get('code');
        $redirect_uri = env('WB_CALLBACK_URL');
        $keys = [];
        
	    $keys['code'] = $code;
	    $keys['redirect_uri'] = $redirect_uri;
		$token = $this->authClient->getAccessToken( 'code', $keys ) ;
        //var_dump($token);
        if ($token) {
            session(['token'=>$token]);
            $this->weiboClient = new \SaeTClientV2( env('WB_AKEY') , env('WB_SKEY') , $token['access_token'] );
            //var_dump($this->weiboClient->share('这是一条测试微博@Magic寻梦 http://shuoshuoshuoshuoshuoshuoshuoshuoshuoshuoshuoshuo.cn'));
	        //setcookie( 'lunyutoken', $token );
        }
        // $code_url = $this->client->getAuthorizeURL( env('WB_CALLBACK_URL') );
        return redirect()->action('HomeController@timeLine');
    }
}