<?php

namespace app\admin\model;

use think\Model;
use think\facade\Cache;
use think\DB;

class CourseTimeModel extends Model
{
    protected $pk = 'id';
    protected $table = 'cmf_course_time';
    public function sel(){
        
    }
    public static function paginate($page){
         $data = Db::name('course_time')
        ->alias('t')
        ->join('cmf_course c','t.course_id = c.course_id')
        ->field('t.id,c.course_name,t.add_time,t.is_show')
        ->order('t.add_time','desc')
        ->paginate($page);
        $arr = $data;
        foreach($arr as  $v){
            $v['add_time'] = date("Y年m月d日",$v['add_time']);
            $v = 1;
        }
        return $arr;
    }
}