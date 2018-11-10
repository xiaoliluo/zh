<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/12/012
 * Time: 22:38
 */

namespace app\back\common\controller;
use think\Controller;
use think\facade\Session;

use think\facade\Request;


class Base extends Controller
{
    protected function initialize()
    {
//        $this->checkLogin();

//        $this->isOpen();
    }


    protected  function isLogin()
    {
        if(Session::has('user_id')){
            $this->redirect('index/index');
        }
    }


    protected  function checkSession()
    {
        //用来判断用户未登录直接访问后台地址

        if(!Session::has('user_id')){
             $this->error('你还没有登录','index/login');
        }
    }

}