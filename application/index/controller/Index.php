<?php
namespace app\index\controller;
use app\common\controller\Base;
use app\common\model\ArtCate;
use app\common\model\Article;
use think\facade\Request;
use app\common\model\User;
use app\common\model\UserFav;
use app\common\model\UserLike;

use app\common\model\Comment;

class Index extends Base
{
    public function index()
    {
        $cate_id = Request::param('cate_id');


            $keyword = Request::param('keyword');
            $map = [];

            if($keyword){
                $map[] = ['title','like',"%".$keyword."%"];
            }


            if($cate_id){
                $map[] = ['cate_id','=',$cate_id];
            }

        //false,['query'=>request()->param()]将搜索条件保留下去
         $mes =  Article::where($map)->where('status',1)->order('create_time','desc')->paginate(5,false,['query'=>request()->param()]);


//        if(isset($cate_id)){
//            //集中分类的情况
//            $mes =  Article::where('cate_id',$cate_id)->where('status',1)->order('create_time','desc')->paginate(3);
//
//        } else {
//            //点击首页的情况
//            $mes = Article::where('status',1)->order('create_time','desc')->paginate(5);
//        }
//        halt($cate_id);


       //用于分页
//        $list = Article::where('cate_id',$cate_id)->paginate(1);
        $this->assign('list',$mes);
//        halt($list);


       $this->assign('mes',$mes);
//       halt($mes);
//       halt($mes);
        return  $this->fetch();

//        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

//    public function hello($name = 'ThinkPHP5')
//    {
//        return 'hello,' . $name;
//    }


    /**
     * 分用发布文章
     * 必须在用户登录的情况下
     */
    public function issue()
    {

        $this->checkLogin();

        $this->view->assign('title','发布文章');
        $res = ArtCate::where('status',1)->select();
//        halt($res);
       if(count($res)>0){
           $this->assign('res',$res);
       } else {
           $this->redirect('index/index/insertCate');
       }


        return $this->fetch();

    }

    public function insertCate(){
        if(Request::isPost()){
            $data = Request::param();
            $msg =  $this->validate($data,'app\common\Validate\ArtCate');
            if(true !== $msg){
               echo "<script>alert('$msg');</script>";
//               echo 999999999;

            } else {
                $res = ArtCate::create($data);
                if($res){
                     $this->redirect('index/index/issue');

                } else {
                     $this->error('添加失败','index/index/insertCate');

                }
            }
        }


       return  $this->fetch();

       // ArtCate::create($data);
    }

    /**
     *  发布文章内容
     */

    public function faBuArticle()
    {


        if(Request::isPost()){

           $cate_id =  Request::param('cate_id');
           $data = Request::param();

           $data['cate_id'] = ArtCate::where('name',$cate_id)->value('id');
//            halt($data);

//           halt($data);
             $msg =  $this->validate($data,'app\common\Validate\Article');
          if($msg !== true){
              echo "<script>alert('$msg');window.history.back();</script>";

          } else {

              $file =   Request::file('title_img');
              $info = $file->validate(['size'=>5000000,'ext'=>'jpg,png,gif'])->move( './upload');//默认上传文件地址以public目录开始算
              if($info){
//                  halt($info->getSaveName());
                  $data['title_img'] = str_replace("\\","/",$info->getSaveName()) ;//路径是反斜杆的linux不能识别，做个转换,\需要转义，所以前面需要再加一个\
                  $ar_data =  Article::create($data);
                  if($ar_data){
                      $this->success('文章发布成功','index/index/index');

                  } else {
                      $this->error('发布失败，联系管理员');
                  }
//                  halt($ar_data);
              } else {
                     $mess = $file->getError();
                     echo "<script>alert('$mess');window.history.back();</script>";
              }


          }


        } else {
            $this->error('请求类型错误','index/index/issue');
        }


    }

    //详情页面
    //之前用的res变量和base控制器里面的res变量发生冲突，导致导航栏里面的内容加载不出来，换了变量之后就解决了

    public function detail()
    {

      $id =  Request::param('id');
      $mes =  Article::where('id',$id)->find();

        Article::where('id',$mes->id)->setInc('pv',1);


        $list =  Comment::where('status',1)->order('create_time','desc')->select();

        $this->assign('mes',$mes);
        $this->assign('list',$list);
      return  $this->fetch();

    }

    /**
     * 用户收藏
     */

    public function fav()
    {
        if(Request::isAjax()){
            $res = Request::except('name');
            $name = Request::param('name');
            switch ($name){


                case '收藏':
                   // $exist_msg = UserFav::where('user_id',$res['user_id'])->where('article_id',$res['article_id'])->find();
//                    $exist_msg = UserFav::where('user_id',$res['user_id'])->where('article_id',$res['article_id'])->find();
//                    if($exist_msg) {
//                        return ['status' => 5, 'message' => '你已经收藏过改文章'];
//                    } else {
                        $msg =  UserFav::create($res);
                        if($msg){
                            return ['status'=>1,'message'=>'收藏成功'];
                        } else {
                            return ['status'=>2,'messsge'=>'收藏失败,请检查网络'];
                        }

//                    }

                    break;

                case '取消收藏':
                    $msg = UserFav::where('article_id',$res['article_id'])->delete();
                    if($msg){
                        return ['status'=>3,'message'=>'取消收藏成功'];

                    } else {
                        return ['status'=>4,'message'=>'取消收藏失败，请检查网络'];

                    }

                    break;

            }


        } else {
            $this->error('请求类型错误');
        }

    }

    /**
     * 用户点赞
     */
    public function like()
    {


        if(Request::isAjax()){
            $res = Request::param('');

            $exist_msg = UserLike::where('user_id',$res['user_id'])->where('article_id',$res['article_id'])->find();
            if($exist_msg){
                return ['status'=>3,'message'=>'你已经点过赞了'];

            } else {

                $msg =  UserLike::create($res);
                if($msg){
                    return ['status'=>1,'message'=>'点赞成功'];
                } else {
                    return ['status'=>2,'messsge'=>'点赞成功,请检查网络'];
                }

            }


        } else {
            $this->error('请求类型错误');
        }
    }



    //用户评论

    public function comment(){


        if(Request::isAjax()){

            $mes  = Request::param();

//            halt($mes);

            $data = Comment::create($mes,true);





                if($data){

                    $new_last = Comment::where('id',$data->id)->find();

                    return ['status'=>0,'message'=>'评论成功','new_list'=>$new_last['content']];
                } else {
                    return ['status'=>1,'message'=>'评论失败'];
                }







        } else {





        }





    }


}
