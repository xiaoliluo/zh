<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 15:49
 */

namespace app\back\controller;
use app\back\common\controller\Base;
use think\facade\Request;
use app\common\model\Article as ArticleModel;
use think\facade\Session;
use app\common\model\ArtCate;


class Article extends Base
{

    public function index(){

        if(Session::get('is_admin') == 2){

            //超级管理员可以看到所有的新闻

            $data  = ArticleModel::order('id','desc')->paginate(5);

        } else {
            //普通管理员只能看到自己发布的
            $data = ArticleModel::where('user_id',Session::get('user_id'))->paginate(2);
        }



        $this->assign('data',$data);

        return $this->fetch();

    }


    public function editList()
    {
//        halt();

        $id = Request::param('id');

        $cate = ArtCate::field('id,name')->select();
//        halt($cate);

        $data = ArticleModel::where('id',$id)->find();

        $this->assign('cate',$cate);

        $this->assign('data',$data);

        return $this->fetch();
    }



    public function edit(){

        $id = Request::param('id');
        $data = Request::param();
        unset($data['id']);
        $msg =  $this->validate($data,'app\common\Validate\Article');

       if($msg !== true){
           echo "<script>alert('$msg');window.history.back();</script>";
       } else {


           $file =   Request::file('title_img');
           $info = $file->validate(['size'=>5000000,'ext'=>'jpg,png,gif'])->move( './upload');//默认上传文件地址以public目录开始算
           if($info){
//                  halt($info->getSaveName());
               $data['title_img'] = str_replace("\\","/",$info->getSaveName()) ;//路径是反斜杆的linux不能识别，做个转换,\需要转义，所以前面需要再加一个\
               $ar_data =  ArticleModel::where('id',$id)->data($data)->update();
               if($ar_data){
                   $this->success('文章更新成功','article/index');

               } else {
                   $this->error('文章更新失败或者没有更新');
               }
//                  halt($ar_data);
           } else {
               $mess = $file->getError();
               echo "<script>alert('$mess');window.history.back();</script>";
           }

       }




    }

    public function delete(){

        $id = Request::param('id');

       $num =  ArticleModel::where('id',$id)->delete();

       if($num){

           return ['status'=>0,'message'=>'删除成功'];

       } else {

           return ['status'=>1,'message'=>'删除失败'];

       }






    }


    public function test(){

    }



}