<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use app\common\model\User;
use app\common\model\ArtCate;
// 应用公共文件


    function getUserName($user_id)
    {
        $name =  User::where('id',$user_id)->value('name');
        return $name;
    }

    //无乱码截取中文字符串
    function substrDetail($content)
    {
        $message = mb_substr($content,0,15);
        return $message;
    }


    function status($status)
    {
        $data = [0=>'隐藏',1=>'显示'];
        return $data[$status];
    }

    //获取分类
    function getCate($cate_id){


        $name = ArtCate::where('id',$cate_id)->value('name');

        return  $name;




    }