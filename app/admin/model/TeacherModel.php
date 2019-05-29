<?php

namespace app\admin\model;

use think\Model;
use think\facade\Cache;
use think\DB;

class TeacherModel extends Model
{
    protected $pk = 'teacher_id';
    /*public function select(){
        $list = parent::select();
        return $list;
    }*/
    public function get($id){
        $teacher = parent::get($id);
        return $teacher;
    }
    public function sel(){
        $list = DB::table('cmf_teacher')
            ->alias('t')
            ->join('cmf_position p','p.position_id = t.position_id')
            ->field('t.list_order,t.teacher_id,t.name,t.age,t.teacher_tel,t.teacher_portrait_src,p.position_name,t.sex')
            ->paginate(2);
        return $list;
    }
}