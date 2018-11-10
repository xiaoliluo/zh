<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/15/015
 * Time: 23:27
 */

namespace app\back\controller;
use app\back\common\controller\Base;
use app\common\model\User as Usermodel;
use think\facade\Request;



class User extends Base
{
    public function index()
    {
        $map[]  = ['status','=',1];
        $map[]  = ['is_admin','<>',0];
       $data =  Usermodel::where($map)->order('id','asc')->paginate(5);


       $this->assign('data',$data);
       return  $this->fetch();
    }


    public function editList()
    {
        $id = Request::param('id');
        $data = Usermodel::where('id', $id)->find();
        $this->assign('data', $data);
        return $this->fetch();

    }



    public function  edit()
    {
        if(Request::isAjax()){

            $res = Request::param();
            $password = UserModel::where('id',$res['id'])->value('password');

//            file_put_contents('a.txt',$password);
//            die;

            if($res['password']   == $password){
                unset($res['password']);
                //如果ajax传过来的密码值和数据库里面密码一致，说明密码未作修改，更新数据库的时候，不更新密码
                if( UserModel::where('id',$res['id'])->data($res)->update()){
                    return ['status'=>0,'message'=>'更新成功'];
                } else {
                    return ['status'=>1,'message'=>'没有更新或者更新失败'];
                }
            } else {
                //反之，则更新

                $res['password'] = sha1($res['password']);

               if( UserModel::where('id',$res['id'])->data($res)->update()){
                   return ['status'=>2,'message'=>'更新成功'];

               } else {
                   return ['status'=>3,'message'=>'没有更新或者更新失败'];

               }

            }


        } else {
            $this->error('请求类型错误');
        }
    }


    public function delete()
    {
        if (Request::isPost()) {

            $id = Request::param('id');
            $num = UserModel::where('id', $id)->delete();
            if ($num) {

                return ['status' => 0, 'message' => '删除成功'];


            } else {
                return ['status'=>0,'message'=>'删除失败,请检查网络或者联系管理员'];
            }

        }

    }


}