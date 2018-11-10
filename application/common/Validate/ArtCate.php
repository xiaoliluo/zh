<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/29/029
 * Time: 22:01
 */

namespace app\common\Validate;
use think\Validate;

class ArtCate extends Validate
{
    protected $rule = [

        'name|栏目名称'=>[
            'require',
            'length'=>'3,20',
            'chsAlphaNum'=>'chsAlpha',
        ],

    ];

}