<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/29/029
 * Time: 21:56
 */
namespace app\common\Validate;
use think\Validate;
class Article extends Validate
{
    protected $rule = [

        'title|标题'=>[
            'require',
            'length'=>'6,20',
            'chsAlphaNum'=>'chsAlphaNum',//
        ],

        'content|文章内容'=>[
            'require',
        ],


//        'title_img|图片'=>[
//            'require',
//            'image'=>'image'
////            'file'=>'image'
//        ],

//        'user_id|作者'=>[
//            'require',
//        ],
//
        'cate_id|栏目名称'=>['require',

        ]


    ];

    //场景验证，为控制器里面某些字段提供验证
    protected $scene = [
        'login' => ['mobile','password']
    ];

}