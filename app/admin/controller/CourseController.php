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
use app\admin\model\CourseModel;

class CourseController extends AdminBaseController
{
    public function list()
    {
        $course = CourseModel::paginate(2);
 
        $this->assign('course', $course);
        $this->assign('page', $course->render());//单独提取分页出来
        return $this->fetch();
    }

    public function add()
    {
        return $this->fetch();
    }


    public function addPost()
    {
        $data = $this->request->param();
        
        $data['create_time'] = time();
        $data['update_time'] = time();
        $CourseModel = new CourseModel();
        $result    = $this->validate($data, 'Course');
        if ($result !== true) {
            $this->error($result);
        }
        $CourseModel->allowField(true)->save($data);

        $this->success("添加成功！", url("Course/list"));
    }


    public function edit()
    {
        $id = $this->request->param('id', 0, 'intval');
        $CourseModel = new CourseModel();
        $course_one = $CourseModel->get($id);
        $this->assign('course', $course_one[0]);
        return $this->fetch();
    }


    public function editPost()
    {
        $data      = $this->request->param();

        $CourseModel = new CourseModel();
        $result    = $this->validate($data, 'Course');

        if ($result !== true) {
            $this->error($result);
        }
        $CourseModel->allowField(true)->isUpdate(true)->save($data);

        $this->success("保存成功！", url("course/list"));
    }


    public function delete()
    {
        $id = $this->request->param('id', 0, 'intval');
        CourseModel::destroy($id);
        $this->success("删除成功！", url("course/list"));
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