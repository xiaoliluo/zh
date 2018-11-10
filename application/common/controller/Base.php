<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/26/026
 * Time: 10:57
 */
namespace app\common\controller;
use think\Controller;
use think\facade\Session;
use app\common\model\ArtCate;
use app\common\model\Site;
use think\facade\Request;
use app\common\model\Article;

class Base extends Controller
{
    /**
     * 用户控制器应继承自这个基础公共控制器
     * 该控制器继承自Controller.php
     * 用户可以将一些公共操作放在这个公共控制器
     */
    protected function initialize()
    {
        //导航栏数据，每个页面都用得到，属于公共部分
        $this->showNav();
        $this->isOpen();
        $this->rightList();
    }


    //已经登录的情况下直接跳转
    public function isLogin()
    {
        if(Session::has('user_id')){

            $this->redirect('index/index/index');
        }
    }




    //检测是否登录操作
    public function checkLogin()
    {
        if(!Session::has('user_id')){
//            halt(999);
            echo "<script>alert('你还没有进行登录，请登陆后再执行');</script>";
           // return $this->redirect('index/user/login');
        }
    }


    protected function showNav()
    {
       $res =  ArtCate::where('status','<>','0')->order('sort','desc')->select();
//       halt($res);
       $this->view->assign('res',$res);

    }




    //检测前台网站是否开启
    protected function isOpen()
    {

        $is_open = Site::value('is_open');


        if($is_open == 0 && Request::module() == 'index'){



            $info = <<< INFO
            <body style="color: #2aabd2;background-color: #9acfea;">
            <h4 style="text-align:center;margin:200px;font-size: 50px" >站点维护中......</h4>
            </body>

INFO;

            exit($info);
        }



    }


    //前台网站右侧文章列
    protected function rightList(){

        $article = Article::where('status','1')->order('pv','desc')->limit(15)->select();

        $this->assign('article',$article);

    }





}