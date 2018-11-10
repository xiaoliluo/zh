<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19/019
 * Time: 2:05
 */

namespace app\common\model;


use think\Model;


class Site extends Model
{

    protected $pk = 'id';//主键
    protected $table = 'zh_site';//表名
    protected $autoWriteTimestamp = true;//自动时间戳
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    protected $auto = [];

    protected $insert = ['create_time','is_reg'=>1,'mark'=>1];

    protected $update = ['update_time'];




}