<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class UserController extends controller
{
    private $weiboClient;

    public function __construct()
    {
        //init controller
    }

    /*
     *  获取当前用户timeline首页 
     */
    public function timeLine(Request $request){
        $token = $request->session()->get('token');
        $this->weiboClient= new \SaeTClientV2( env('WB_AKEY') , env('WB_SKEY') , $token['access_token'] );
        //var_dump($this->weiboClient->home_timeline());
        return $this->weiboClient->user_timeline_by_id($token['uid']);
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
     * 获取用户关系
     */
    public function relatedPeople(Request $request){
        $screenname = $request->query("screenname");
        $token = $request->session()->get("token");
        $this->weiboClient= new \SaeTClientV2( env('WB_AKEY') , env('WB_SKEY') , $token['access_token'] );
        return $this->weiboClient->friends_chain_followers($screenname);
    }

    /*
     * 发送一条定向微博
     */
    public function sendLun(Request $request){
        $data = $request->json()->all();
        // TODO: 添加解析上传数据的方法
    }

    /*
     * 点赞列表
     */
    public function interestingPeople(){
        $token = $request->session()->get("token");
        $this->weiboClient= new \SaeTClientV2( env('WB_AKEY') , env('WB_SKEY') , $token['access_token'] );
        return $this->weiboClient->suggestions_may_interested();
    }
}