<?php

namespace app\admin\model;

use think\Model;
use think\facade\Cache;
use think\DB;

class CourseModel extends Model
{
    protected $pk = 'course_id';
    public function sel(){
        $course = DB::table('cmf_course')->select();
        return $course;
    }
    public function get($id){
        $course = DB::table('cmf_course')->where('course_id','=',$id)->select();
        return $course;
    }
}