<?php

namespace app\admin\model;

use think\Model;
use think\DB;

class EnrollModel extends Model
{   
    protected $pk = 'id';
   
    public static function paginates($num){
        $res = DB::table('cmf_enroll')
            ->alias('e')
            ->leftjoin('cmf_course','cmf_course.course_id = e.course_id')
            ->leftjoin('cmf_campus','cmf_campus.id = e.campus_id')
            ->order('e.add_time','desc')
            ->field("e.id,e.add_time,e.tel,e.qq,e.status,e.name,cmf_campus.campus,cmf_course.course_name")
            ->paginate($num);
        
        return $res;
    }
     
}
