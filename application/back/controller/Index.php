<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/12/012
 * Time: 22:35
 */

namespace app\back\controller;
use app\back\common\controller\Base;
use think\facade\Request;
use app\common\model\User as UserModel;
use think\Controller;
use think\facade\Session;

class Index extends  Base{

    public function login()
    {

        //已经登录情况下，在访问登录页面直接跳转到登录后首页
        $this->isLogin();

        $this->view->assign('name','后台登录');
        return $this->fetch();
    }


    public function checkLogin()
    {
//
        if(Request::isAjax()){
            $data = Request::param();

            file_put_contents('a.txt',$data);



            $rule =     [  'mobile|手机号码'=>[
                'require',
                'mobile'=>'mobile',
//                'unique'=>'zh_user',
                'number'=>"number"
            ],

                'password|密码'=>[
                    'require',
                    'length'=>'6,20',
                    'chsAlphaNum'=>'chsAlphaNum',

                ],
            ];

            $msg =  $this->validate($data,$rule);
            if($msg !== true){
                return ['status'=>0,'message'=>$msg];
            } else {

                $map[] = ['mobile','=',$data['mobile']];
                $map[] = ['password','=',sha1($data['password'])];
                $map[] = ['is_admin','<>',0];

                $res = UserModel::where($map)->find();
//            file_put_contents('a.txt',$res);die;
                if(null === $res){
                    return ['status'=>1,'message'=>'手机号码或者密码不正确'];

                } else {
                    //登陆成功，将用户信息写入session
                    Session::set('is_admin',$res['is_admin']);
                    Session::set('user_id',$res['id']);
                    Session::set('user_name',$res['name']);

                    return ['status'=>2,'message'=>'登陆成功'];
                }



            }

        } else {
            $this->error('请求类型错误','login');
        }
    }


    public function index()
    {
        $this->checkSession();
        $this->view->assign('title','后台管理');
        return $this->fetch();
    }


    public function quitLogin()
    {

        Session::clear();
        $this->redirect('index/login');

    }
}