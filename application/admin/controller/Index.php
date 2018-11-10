<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/18/018
 * Time: 7:48
 */
namespace app\admin\controller;

use think\Controller;
use think\facade\Config;
use think\Db;
class Index extends Controller
{



    public function index(){
        //halt(Config::get('app.'));
       // halt(config('app.'));
       // halt(config('?database.hostname'));//助手函数查询该配置项是否存在
    }

    //容器，里面放许多对象
    //依赖注入 向类方法里面里面传一个对象的意思
    public function getMethod(\app\common\Temp $temp)
    {
        //      \app\common\Temp $temp 相当于 $temp = new \app\common\Temp;
       return  $temp->setName();
    }

    public function testRequest(){
        //1不使用静态代理方法
        //$request = new \think\Request;
        //2使用控制器自带request属性进行访问 $this->request 相当于new Request()
          //dump($this->request->get());$this->>request = new Request
         //$request->get() ;
        //3也可以使用静态方法访问，推荐
        //4依赖注入的方式访问

    }


    /**
     * 数据库查询方法
     */

    public function find()
    {


        //查询
      //$return =   Db::table('kn_admin')->where('id','=',1)->find();//等同于$return =   Db::table('kn_admin')->find(1)
      //$return =   Db::table('kn_admin')->where('id','>',1)->select();//条件表达式
     // $return =   Db::table('kn_admin')->field('id,username,passwd')->where('id','=',1)->find();
     // $return =   Db::table('kn_admin')->field(['id'=>'编号','username'=>'姓名','passwd'=>'密码'])->where('id','=',1)->find();//起别名


        //多条件查询
    //        $return =   Db::table('kn_admin')
    //            ->field('id,username,passwd')
    //            ->where([
    //                ['id','>','1'],
    //                ['idcard','=','56765']
    //            ])->select();

         //dump($return);
    }

    /**
     * 数据库插入方法
     */
    public function insert()
    {
        //插入数据,单条
        // $data = ['name'=>'笑话4','age'=>20,'create_time'=>time()];
        // $return =   Db::table('kn_test')->insert($data);
        // $return =   Db::table('kn_test')->insert($data,true);//等同于 REPLACE INTO `kn_test` (`name` , `age` , `create_time`) VALUES ('笑话1' , 20 , '1537317385')



        //$return  = Db::table('kn_test')->insertGetId($data);//添加数据后如果需要返回新增数据的自增主键，可以使用insertGetId方法新增数据并返回主键值：

        //插入多条数据

    //        $data = [
    //            ['name'=>'笑话5','age'=>20,'create_time'=>time()],
    //            ['name'=>'笑话6','age'=>20,'create_time'=>time()],
    //            ['name'=>'笑话7','age'=>20,'create_time'=>time()]
    //        ];
    //        $return = Db::table('kn_test')->insertAll($data);

            //dump($return);

    }


    /**
     * 数据库更新操作
     */

    public function update()
    {

    //      $data = ['name' => 'thinkphp1','id'=>2];
    //       $return =  Db::table('kn_test')
    //            ->update($data);


    //       $return =  Db::table('kn_test')
    //           ->where('name','thinkphp1')
    //            ->update(['age'=>18]);

        //5.1版本好像不支持update里面直接传入$data,update里面还是要直接写数组的形式
       //dump($return);
    }


    /**
     * 数据库删除操作
     */

    public function delete()
    {
//        $return =  Db::table('kn_test')
//              ->where('name','thinkphp1')
//            ->delete();

//
//        $return =  Db::table('kn_test')
//            ->delete(3);//根据主键删除
//
//        dump($return);

    }



    /**
     * 原生写法
     */
    public function curd()
    {
        //query 查询
    //        $sql = "select * from kn_test where id = 7";
    //        $return =  Db::query($sql);
    //        dump($return);



        //execute 增，删，改

//        $sql = "update kn_test set name = 666  where id = 11";
//       $return =  Db::execute($sql);
//       dump($return);

    }











}