<?php

namespace App\Http\Controllers;


class AccountController extends controller
{
    private $client;

    public function __construct()
    {
        //init conreoller
        $this->client = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
    }

    public function callback()
    {
        $code = Input::get('code');
        $redirect_uri = WB_CALLBACK_URL;

        try {
		    $token = $o->getAccessToken( 'code', $keys ) ;
	    } catch (OAuthException $e) {

	    }

        if ($token) {
	        $_SESSION['token'] = $token;
	        setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
        }
    }
}