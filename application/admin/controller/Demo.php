<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/20/020
 * Time: 2:03
 */

namespace app\admin\controller;
use think\Controller;
use app\admin\model\Test;

class Demo extends Controller
{
    public function demo()
    {

        //重点，这里使用模型操作数据库，Test::相当于Db::table('admin')
      // dump(Test::get(1)) ;

        //静态方法添加数据
    //        $res = Test::create([
    //            'name'  =>  '黑寡妇',
    //            'age' =>  '12',
    //            'create_time'=>time(),
    //        ]);



        //静态方法更新数据

    //        $res = Test::where('id', 1)
    //            ->update(['name' => 'thinkphp5']);

        //静态方法删除数据
      // $res =  Test::where('id','=',1)->delete();

        //静态方法查询

     //   $res = Test::where('name', '=','笑话1')->find();

       // dump($res);
    }
}