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
use app\admin\model\CourseTimeModel;
use app\admin\model\CourseModel;

class CourseTimeController extends AdminBaseController
{
    public function index()
    {
        $CourseTime = CourseTimeModel::paginate(2);
        $this->assign('CourseTime', $CourseTime);
        $this->assign('page', $CourseTime->render());//单独提取分页出来
        return $this->fetch();
    }

    public function add()
    {
        $course = CourseModel::all();
        $this->assign('course',$course);
        return $this->fetch();
    }


    public function addPost()
    {
        $data = $this->request->param();
        $data['add_time'] = strtotime($data['add_time']);
        $CourseTimeModel = new CourseTimeModel();
        $result    = $this->validate($data, 'CourseTime');
        if ($result !== true) {
            $this->error($result);
        }
        $CourseTimeModel->allowField(true)->save($data);

        $this->success("添加成功！", url("CourseTime/index"));
    }


    public function edit()
    {
        $id = $this->request->param('id', 0, 'intval');
        $CourseTimeModel = new CourseTimeModel();
        $CourseTime = $CourseTimeModel->get($id);
        $course = CourseModel::all();
        $this->assign('course',$course);
 
        $this->assign('course', $course);
        $this->assign('CourseTime', $CourseTime);
        return $this->fetch();
    }


    public function editPost()
    {
        $data      = $this->request->param();
        $data['add_time'] = strtotime($data['add_time']);
        $CourseTimeModel = new CourseTimeModel();
        $result    = $this->validate($data, 'CourseTime');

        if ($result !== true) {
            $this->error($result);
        }
        $CourseTimeModel->allowField(true)->isUpdate(true)->save($data);

        $this->success("保存成功！", url("CourseTime/index"));
    }


    public function delete()
    {
        $id = $this->request->param('id', 0, 'intval');
        CourseTimeModel::destroy($id);
        $this->success("删除成功！", url("CourseTime/index"));
    }

     
     

}