<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/18/018
 * Time: 11:19
 */

namespace app\back\controller;
use app\back\common\controller\Base;
use think\facade\Request;

use app\common\model\Site as SiteModel;





class Site extends Base
{

    public function index(){

        if(Request::isPost()){

            $data = Request::param();

//            halt($data);

            //没有插入数据，有的话更新数据，要保持表中有unique索引
            $res =  SiteModel::create($data,null,true);

           if($res){

               return ['status'=>0,'message'=>'配置成功'];
//               $this->success('保存成功','user/index');

           } else {

               return ['status'=>1,'message'=>'配置失败'];
//               $this->error('保存失败');
           }

        } else {

            if($data = SiteModel::find()){
//                halt($data);

                $this->assign('data',$data);

            }

            return $this->fetch();

        }

    }

}