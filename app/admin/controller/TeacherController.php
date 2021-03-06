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

use cmf\controller\AdminBaseController;
use cmf\controller\BaseController;
use app\admin\model\TeacherModel;
use app\admin\model\PositionModel;
use app\admin\model\CourseModel;
use app\admin\model\ClassModel;
class TeacherController extends AdminBaseController
{
    public function index()
    {
        //$Teachers = TeacherModel::paginate(2);
        $Teachers = new TeacherModel;
        $Teachers = $Teachers->sel();
        //print_r($Teachers);die;
        $this->assign('teachers', $Teachers);
        $this->assign('page', $Teachers->render());//单独提取分页出来
        return $this->fetch();
    }
 
    public function add()
    {
        $TeacherModel = new PositionModel();
        $teacher = $TeacherModel->pos();
        $CourseModel = new CourseModel();
        $course = $CourseModel->sel();
        $ClassModel = new ClassModel();
        $class  = $ClassModel->allclass();
        //print_r($class);die;
        $this->assign('class', $class);
        $this->assign('course', $course);
        $this->assign('teacher', $teacher);
        return $this->fetch();
    }

   
    public function addPost()
    {
        $data = $this->request->param();
        $TeacherModel = new TeacherModel();
        if(empty($data['teacher_portrait_src'])){  $this->error("请上传图片");   }
        if( strstr($data['teacher_portrait_src'],"http://") ||strstr($data['teacher_portrait_src'],"https://")){
            $data['teacher_portrait_src']  = $data['teacher_portrait_src'];
        }else{
            $data['teacher_portrait_src']  =  "https://".$_SERVER['SERVER_NAME']."/upload/".$data['img'];
        }
        $result    = $this->validate($data, 'Teacher');

        if ($result !== true) {
            $this->error($result);
        }
        $TeacherModel->allowField(true)->save($data);

        $this->success("添加成功！", url("Teacher/index"));
    }

   
    public function edit()
    {
        $id = $this->request->param('id', 0, 'intval');
        $TeacherModel = new TeacherModel();
        $teacher = $TeacherModel->get($id);

        $PositionModel = new PositionModel();
        $teacher_pos = $PositionModel->pos();
        $teacher_one = $PositionModel->get($teacher->position_id);

        $CourseModel = new CourseModel();
        $course_pos = $CourseModel->sel();
        $course_one = $CourseModel->get($teacher->course_id);

        $ClassModel = new ClassModel();
        $class_all  = $ClassModel->allclass();
        $class_one = $ClassModel->get($teacher->class_id);

        $this->assign('class_all', $class_all);
        $this->assign('class_one', $class_one);
        $this->assign('course_pos', $course_pos);
        $this->assign('course_one', $course_one);
        $this->assign('teacher_pos', $teacher_pos);
        $this->assign('teacher_one', $teacher_one);
        $this->assign('teacher', $teacher);
        return $this->fetch();
    }

    
    public function editPost()
    {
        $data      = $this->request->param();
        
        $TeacherModel = new TeacherModel();
        $result    = $this->validate($data, 'Teacher');
         
        if ($result !== true) {
            $this->error($result);
        }
        $data['teacher_tel'] = (int)$data['teacher_tel'];
        //halt($data);
        $TeacherModel->isUpdate(true)->save($data);
        $this->success("保存成功！", url("Teacher/index"));
    }

  
    public function delete()
    {
        $id = $this->request->param('id', 0, 'intval');
        TeacherModel::destroy($id);
        $this->success("删除成功！", url("teacher/index"));
    }
 
    public function listOrder()
    {
        $TeacherModel = new TeacherModel();
        BaseController::listOrders($TeacherModel);
        $this->success("排序更新成功！");
    }
 
    public function toggle()
    {
        $data      = $this->request->param();
        $TeacherModel = new TeacherModel();

        if (isset($data['ids']) && !empty($data["display"])) {
            $ids = $this->request->param('ids/a');
            $TeacherModel->where('teacher_id', 'in', $ids)->update([$data["type"] => 1]);
            $this->success("更新成功！");
        }

        if (isset($data['ids']) && !empty($data["hide"])) {
            $ids = $this->request->param('ids/a');
            $TeacherModel->where('teacher_id', 'in', $ids)->update([$data["type"] => 0]);
            $this->success("更新成功！");
        }


    }

}