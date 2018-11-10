<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/29/029
 * Time: 21:47
 */

namespace app\common\model;
use think\Model;


class ArtCate extends Model
{

    protected $pk = 'id';//主键
    protected $table = 'zh_article_category';//表名
    protected $autoWriteTimestamp = true;//自动时间戳
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    protected $auto = [];

    protected $insert = ['create_time','status'=>1];

    protected $update = ['update_time'];




}