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

class CourseValidate extends Validate
{
    protected $rule = [
        'course_name' => 'require',
        'list_order'  => 'require',
        'course_num'  => 'require',
        'enroll_link'  => 'require',
        'outline_link'  => 'require',
        'course_form'  => 'require',
        'course_state'  => 'require',
        'course_details'  => 'require',

    ];

    protected $message = [
        'course_name.require' => '课程名不能为空',
        'list_order.require'  => '排序不能为空',
        'course_num.require' => '开班期数不能为空',
        'enroll_link.require' => '报名链接不能为空',
        'outline_link.require' => '大纲页链接不能为空',
        'course_form.require'  => '授课形式不能为空',
        'course_state.require' => '课程状态不能为空',
        'course_details.require' => '课程详情介绍不能为空',
    ];

}