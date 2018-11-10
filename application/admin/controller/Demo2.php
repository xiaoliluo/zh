<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/21/021
 * Time: 11:18
 */

namespace app\admin\controller;


class Demo2 extends \think\Controller
{
    public $only;

    public $request;

    public function index()
    {
        return $this->fetch();
    }


    public function test()
    {
        return $this->fetch();
    }



    public function a($name = '')
    {
        $this->only = $name;
//        dump($this->only);
//        dump($this);
//        die;
        return $this;
    }



    public function b($request = '')
    {
        $this->request = $request;
        echo $this->only;
        echo 999;
    }


//
//   public function where($where)
//    {
//        echo $where;
//        dump($this);
//        return $this;//重点
//    }
//
//    public function order($order)
//    {
//        echo $order;
//        dump($this);
//        return $this;
//    }
//
//    public function limit($limit)
//    {
//        echo $limit;
//        return $this;
//    }
//
//
//



}


//$db = new Demo2;
//
//dump($db->a('真好')->b());
//$db->only;
//
//

//
//dump($db->where("id = 1")->order("id desc")->limit(10));




