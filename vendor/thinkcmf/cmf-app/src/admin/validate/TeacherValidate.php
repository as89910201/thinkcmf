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

class TeacherValidate extends Validate
{
    
    protected $rule = [
        'name' => 'require',
        'list_order' => '/^\d{1,6}$/',
        'age' =>'/^\d{1,3}$/',
        'teacher_tel' => '/^1[34578]{1}\d{9}$/',
        'obtain_employment_time' => '/^\d{1,3}$/',
        'class_id' => 'require',
        'course_id' => 'require',
        'teacher_portrait_src' => 'require',
        'teacher_style' =>"require",
        'position_id' => 'require',
        'sex' => 'require',
    ];

    protected $message = [
        'name' => '名称不能为空',
        'list_order' => '请输入正确的排序',
        'age' =>'年龄错误',
        'teacher_tel' => '请输入正确的电话号码',
        'obtain_employment_time' => '请输入正确的教龄',
        'class_id' => '请选择班级',
        'course_id' => '请选择教授课程',
        'teacher_portrait_src' => '教师头像不能为空',
        'position_id' => '所任职位不能为空',
        'teacher_style'=>"授课风格不能为空",
        'sex' => '性别不能为空',
        ];

}