<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/20/020
 * Time: 9:46
 */

namespace app\common\model;

use think\Model;




class Comment extends Model
{


    protected $pk = 'id';//主键
    protected $table = 'zh_user_comments';//表名
    protected $autoWriteTimestamp = true;//自动时间戳
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $auto = [];

    protected $insert = ['create_time','status'=>1,];

    protected $update = ['update_time'];

}