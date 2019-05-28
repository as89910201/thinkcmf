<?php

namespace app\admin\model;

use think\Model;

class ClassModel extends Model
{   
    protected $pk = 'class_id';
   

    public function  allclass($id = ""){
        $class = $this->select();
        $str = "<select class='form-control' name='class_id' id='input-target'>";
        if(empty($id)){
            foreach($class as $key=>$val){
                $str.= "<option value='".$val['class_id']."'>".$val['class_name']."</option>";    
            }
        }else{
            foreach($class as $key=>$val){
                if($val['class_id'] == $id){
                    $str.= "<option value='".$val['class_id']."' selected='selected'>".$val['class_name']."</option>";
                }else{
                    $str.= "<option value='".$val['class_id']."'>".$val['class_name']."</option>";   
                }    
            } 
        }
        
        $str .= "</select>";
        return $str;
    }
}
