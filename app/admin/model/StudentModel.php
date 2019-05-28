<?php

namespace app\admin\model;

use think\Model;
use think\facade\Cache;

class StudentModel extends Model
{   
    protected $pk = 'student_id';
    public function select(){
        $list = parent::select();
        
        foreach($list as $key => $val){
            $val['enrol_time'] = date("Y年m月d日", $val['enrol_time']);
            $val['graduate_time'] = date("Y年m月d日", $val['graduate_time']);
        }
        return $list;
    }
    public function get($id){
        $student = parent::get($id);
 
        $student['enrol_time'] = date("Y-m-d", $student['enrol_time']);
        $student['graduate_time'] = date("Y-m-d", $student['graduate_time']);
        return $student;
    }
}
