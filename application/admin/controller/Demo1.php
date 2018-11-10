<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/20/020
 * Time: 9:12
 */

namespace app\admin\controller;
use app\admin\model\Test;
use think\facade\Request;


class Demo1 extends \think\Controller
{
      public function show()
      {
         $res = Test::paginate(3) ;
         $this->view->assign('result',$res);

         return $this->fetch();
      }

}