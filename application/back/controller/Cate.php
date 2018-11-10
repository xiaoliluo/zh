<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 9:50
 */

namespace app\back\controller;
use app\back\common\controller\Base;
use app\common\model\ArtCate;
use think\facade\Request;

class Cate extends Base
{
    public function index()
    {
        $data = ArtCate::order('sort','desc')->paginate(5);

        $this->assign('data',$data);

        return $this->fetch();

    }

    public function showList()
    {
        $id = Request::param('id');

        $data = ArtCate::where('id',$id)->find();
        $this->assign('data',$data);
        return $this->fetch();

    }


    //编辑文章分类
    public function showEdit(){
        $id = Request::param('id');
        $data = Request::param();
        unset($data['id']);

        if(ArtCate::where('id',$id)->data($data)->update()){

            return ['status'=>0,'message'=>'更新成功'];
        } else {
            return ['status'=>1,'message'=>'没有更新或者更新失败'];
        }


    }

    //删除分类
    public function delete(){
        $id = Request::param('id');

       $num =  ArtCate::where('id',$id)->delete();

       if($num){
           return ['status'=>0,'message'=>'删除成功'];

       } else {
           return ['status'=>1,'message'=>'删除失败，请检查网络'];
       }

    }

    //添加分类
    public function add(){
//
        if(Request::isPost()){
            $data = Request::param();
//      file_put_contents('aaaaa.txt',$data);

            $res = ArtCate::create($data);

            if($res){
                return ['status'=>0,'message'=>'新增成功'];
            } else {
                return ['status'=>1,'message'=>'新增失败，请检查网络'];
            }
        }


        return $this->fetch();

    }




}