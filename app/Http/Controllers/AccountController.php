<?php

namespace App\Http\Controllers;


class AccountController extends controller
{
    private $client;

    public function __construct()
    {
        //init conreoller
        $this->client = new SaeTOAuthV2( env('WB_AKEY') , env('WB_SKEY'));
    }

    public function index()
    {
        $code_url = $this->client->getAuthorizeURL( env('WB_CALLBACK_URL') );
        return view('welcome',compact('code_url'));
    }

    public function callback()
    {
        // $code = Input::get('code');
        // $redirect_uri = env('WB_CALLBACK_URL');

		// $token = $o->getAccessToken( 'code', $keys ) ;


        // if ($token) {
	    //     session(['token'=>$token]);
	    //     //setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
        // }
        $code_url = $this->client->getAuthorizeURL( env('WB_CALLBACK_URL') );
        return view('welcome',compact('code_url'));
    }
}