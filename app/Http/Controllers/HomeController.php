<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class HomeController extends controller
{
    private $weiboClient;

    public function __construct()
    {
        //init controller
    }

    /*
     *  获取用户timeline首页 
     */
    public function timeLine(Request $request){
        $token = $request->session()->get('token');
        $this->weiboClient= new \SaeTClientV2( env('WB_AKEY') , env('WB_SKEY') , $token['access_token'] );
        var_dump($this->weiboClient->home_timeline());
        return $this->weiboClient->home_timeline();
    }

    /*
     * 获取首页用户信息
     */
    public function userInfo(){
        $token = $request->session()->get("token");
        $this->weiboClient= new \SaeTClientV2( env('WB_AKEY') , env('WB_SKEY') , $token['access_token'] );
        return $this->weiboClient->show_user_by_id($token['uid']);
    }

    /*
     * 获取热门话题
     */
    public function topic(){
        $token = $request->session()->get("token");
        $this->weiboClient= new \SaeTClientV2( env('WB_AKEY') , env('WB_SKEY') , $token['access_token'] );
        return $this->weiboClient->daily_trends();
    }

    /*
     * 发送一条微博
     */
    public function sendLun(){
        
    }

    /*
     * 感兴趣的用户列表
     */
    public function interestingPeople(){
        $token = $request->session()->get("token");
        $this->weiboClient= new \SaeTClientV2( env('WB_AKEY') , env('WB_SKEY') , $token['access_token'] );
        return $this->weiboClient->suggestions_may_interested();
    }
}