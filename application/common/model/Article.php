<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/29/029
 * Time: 21:47
 */

namespace app\common\model;
use think\Model;


class Article extends Model
{

    protected $pk = 'id';//主键
    protected $table = 'zh_article';//表名
    protected $autoWriteTimestamp = true;//自动时间戳
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    protected $auto = [];

    protected $insert = ['create_time','is_hot'=>0,'is_top'=>0,'status'=>1,'pv'=>0];

    protected $update = ['update_time'];




}