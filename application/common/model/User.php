<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/26/026
 * Time: 21:17
 */
namespace app\common\model;
class User extends \think\Model
{

    protected $pk = 'id';//主键
    protected $table = 'zh_user';//表名
    protected $autoWriteTimestamp = true;//自动时间戳
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    //获取器
        public function  getStatusAttr($value)
        {
            $status = [0=>"禁用",1=>'启用'];
            return $status[$value];
        }

//        public function  getIsAdminAttr($value)
//        {
//            $status = [0=>"普通前台会员",1=>'后台普通管理员',2=>'后台超级管理员'];
//            return $status[$value];
//        }


        //修改器

        public function setPasswordAttr($value)
        {
            return sha1($value);
        }


}

