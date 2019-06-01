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
namespace app\admin\controller;
use think\Db;
use cmf\controller\AdminBaseController;
use cmf\controller\BaseController;
use app\admin\model\StudentModel;
use app\admin\model\ClassModel;
class StudentController extends AdminBaseController
{
 
 
    public function index()
    {
        
        $Students = StudentModel::paginate(2);
       
        // 把分页数据赋值给模板变量users
        $this->assign('students', $Students);
      
        $this->assign('page', $Students->render());//单独提取分页出来


        return $this->fetch();
    }
 
    public function add()
    {
        $ClassModel = new ClassModel();
        $select_str = $ClassModel->allclass();
        $this->assign('select_str', $select_str);
         return $this->fetch();
    }

   
    public function addPost()
    {
        $data      = $this->request->param();
        $data['enrol_time'] = strtotime($data['enrol_time']); 
        $data['graduate_time'] = strtotime($data['graduate_time']); 
        if(empty($data['img'])){  $this->error("请上传图片");   }

        
        if( strstr($data['img'],"http://") ||strstr($data['img'],"https://")){
            $data['img']  = $data['img'];
        }else{
            $data['img']  =  "https://".$_SERVER['SERVER_NAME']."/upload/".$data['img'];
        }
        $StudentModel = new StudentModel();
        $result    = $this->validate($data, 'Student');
        if ($result !== true) {
            $this->error($result);
        }
        $StudentModel->allowField(true)->save($data);

        $this->success("添加成功！", url("Student/index"));
    }

   
    public function edit()
    {
        $id        = $this->request->param('id', 0, 'intval');
        $StudentModel = new StudentModel();
        $ClassModel = new ClassModel();

        $Student      = $StudentModel->get($id);
        
        $select_str = $ClassModel->allclass($Student['class_id']);
        $this->assign('select_str', $select_str);
        $this->assign('student', $Student);
        return $this->fetch();
    }

    
    public function editPost()
    {
        $data      = $this->request->param();
        $data['enrol_time'] = strtotime($data['enrol_time']); 
        $data['graduate_time'] = strtotime($data['graduate_time']); 
        if(!empty($data['img'])){
            $data['img']  =  "https://".$_SERVER['SERVER_NAME']."/upload/".$data['img'];
        }
        //dump($data);die;
        $StudentModel = new StudentModel();
        $result    = $this->validate($data, 'Student');
         
        if ($result !== true) {
            $this->error($result);
        }
        $StudentModel->allowField(true)->isUpdate(true)->save($data);

        $this->success("保存成功！", url("Student/index"));
    }

  
    public function delete()
    {
        $id = $this->request->param('id', 0, 'intval');
        StudentModel::destroy($id);
        $this->success("删除成功！", url("student/index"));
    }
 
    public function listOrder()
    {
        $StudentModel = new StudentModel();
        BaseController::listOrders($StudentModel);
        $this->success("排序更新成功！");
    }
 
    public function toggle()
    {
        $data      = $this->request->param();
        $StudentModel = new StudentModel();

        if (isset($data['ids']) && !empty($data["display"])) {
            $ids = $this->request->param('ids/a');
            $StudentModel->where('student_id', 'in', $ids)->update([$data["type"] => 1]);
            $this->success("更新成功！");
        }

        if (isset($data['ids']) && !empty($data["hide"])) {
            $ids = $this->request->param('ids/a');
            $StudentModel->where('student_id', 'in', $ids)->update([$data["type"] => 0]);
            $this->success("更新成功！");
        }


    }

}