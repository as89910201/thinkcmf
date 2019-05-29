<?php

namespace app\admin\model;

use think\Model;
use think\facade\Cache;


class TeacherModel extends Model
{
    protected $pk = 'teacher_id';
    public function select(){
        $list = parent::select();
        return $list;
    }
    public function get($id){
        $teacher = parent::get($id);
        return $teacher;
    }
}