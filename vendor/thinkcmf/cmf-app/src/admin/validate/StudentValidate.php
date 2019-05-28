<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2019 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小夏 < 449134904@qq.com>
// +----------------------------------------------------------------------
namespace app\admin\validate;

use think\Validate;

class StudentValidate extends Validate
{
    protected $rule = [
        'name' => 'require',
        'age'  => 'require|/^[0-9]{1,2}$/',
        'tel' => 'require|/^1[34578]\d{9}$/',
        'is_graduate'=>"require"
  
    ];

    protected $message = [
        'name.require' => '名称不能为空',
        'age.require'  => '年龄不能为空|请输入正确的年龄',
        'tel.require' => '手机号不能为空|请输入正确的手机号',
        'is_graduate.require' => '状态不能为空',
    ];

}