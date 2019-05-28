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
use app\admin\model\LinkModel;

class LinkController extends AdminBaseController
{
    protected $targets = ["_blank" => "新标签页打开", "_self" => "本窗口打开"];

 
    public function index()
    {
        $content = hook_one('admin_link_index_view');

        if (!empty($content)) {
            return $content;
        }

        $linkModel = new LinkModel();
        $links     = $linkModel->select();
        $this->assign('links', $links);

        return $this->fetch();
    }
 
    public function add()
    {
        $this->assign('targets', $this->targets);
        return $this->fetch();
    }

   
    public function addPost()
    {
        $data      = $this->request->param();
        $linkModel = new LinkModel();
        $result    = $this->validate($data, 'Link');
        if ($result !== true) {
            $this->error($result);
        }
        $linkModel->allowField(true)->save($data);

        $this->success("添加成功！", url("Link/index"));
    }

   
    public function edit()
    {
        $id        = $this->request->param('id', 0, 'intval');
        $linkModel = new LinkModel();
        $link      = $linkModel->get($id);
        $this->assign('targets', $this->targets);
        $this->assign('link', $link);
        return $this->fetch();
    }

    
    public function editPost()
    {
        $data      = $this->request->param();
        $linkModel = new LinkModel();
        $result    = $this->validate($data, 'Link');
        if ($result !== true) {
            $this->error($result);
        }
        $linkModel->allowField(true)->isUpdate(true)->save($data);

        $this->success("保存成功！", url("Link/index"));
    }

  
    public function delete()
    {
        $id = $this->request->param('id', 0, 'intval');
        LinkModel::destroy($id);
        $this->success("删除成功！", url("link/index"));
    }
 
    public function listOrder()
    {
        $linkModel = new  LinkModel();
        parent::listOrders($linkModel);
        $this->success("排序更新成功！");
    }
 
    public function toggle()
    {
        $data      = $this->request->param();
        $linkModel = new LinkModel();

        if (isset($data['ids']) && !empty($data["display"])) {
            $ids = $this->request->param('ids/a');
            $linkModel->where('id', 'in', $ids)->update(['status' => 1]);
            $this->success("更新成功！");
        }

        if (isset($data['ids']) && !empty($data["hide"])) {
            $ids = $this->request->param('ids/a');
            $linkModel->where('id', 'in', $ids)->update(['status' => 0]);
            $this->success("更新成功！");
        }


    }

}