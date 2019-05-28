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
        $student = parent::get($id);
        return $student;
    }
}