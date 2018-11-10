<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/26/026
 * Time: 20:29
 */
namespace app\index\controller;
use app\common\controller\Base;
use think\facade\Request;
use think\facade\Session;
use app\common\model\User as UserModel;

class User extends Base
{

    protected $beforeActionList=[

    ];
    public function register()
    {

        //dump(UserModel::get(17));
        $this->assign('title','用户注册');
        return $this->fetch();
    }

    public function insert()
    {
        if(Request::isAjax()){
            $data = Request::param();
         // $data = Request::except('password_confirm','post');//排除请求里面的password_confirm字段值
           // file_put_contents("a.txt",$data);die;//ajax  post传递数据，前台页面打印不出来，可以将数据写到一个文件里面进行查看
//            print_r(json_encode($data));

           $msg =  $this->validate($data,'app\common\Validate\User');
           if(true !== $msg){
               return ['status'=>0,'message'=>$msg];

           } else {
               $res = UserModel::create($data);
               if($res){
                   return ['status'=>1,'message'=>'注册成功'];

               } else {
                   return ['status'=>2,'message'=>'注册失败'];

               }
           }


        } else {
            $this->error('请求类型错误','register');
        }
    }



    public function login()
    {
        $this->isLogin();
       return  $this->view->fetch('login',['title'=>'用户登录']);

    }


    public function loginCheck()
    {

        if(Request::isAjax()){
            $data = Request::param();
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

                $res = UserModel::where('mobile',$data['mobile'])->where('password',sha1($data['password']))->find();
//            file_put_contents('a.txt',$res);die;
                if(null === $res){
                    return ['status'=>1,'message'=>'手机号码或者密码不正确'];

                } else {
                    //登陆成功，将用户信息写入session
                    Session::set('user_id',$res['id']);
                    Session::set('user_name',$res['name']);

                    return ['status'=>2,'message'=>'登陆成功'];
                }



            }

            } else {
            $this->error('请求类型错误','login');
        }
    }

    //用户退出登录
    public function quit()
    {
        Session::clear();
        $this->redirect('index/index/index');
    }


    public function test(){

//        file_put_contents('a.txt',dirname(__FILE__).'/');
//        echo dirname(__FILE__);
//        print_r(session_save_path());
//        dump(Session::get('path'));
        //dump(UserModel::where('mobile','5555555')->find());
    }
}

