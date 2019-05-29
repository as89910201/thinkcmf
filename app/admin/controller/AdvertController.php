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
use app\admin\model\PictureModel;

class AdvertController extends AdminBaseController
{
    public function index()
    {
        $Pictures = new PictureModel;
        $Pictures = $Pictures->sel();
        //$Pictures = $Pictures::paginate(2);
        //print_r($Pictures);die;
        $this->assign('pictures', $Pictures);
        $this->assign('page', $Pictures->render());//单独提取分页出来
        return $this->fetch();
    }

    public function edit()
    {
        $id = $this->request->param('id', 0, 'intval');
        $Pictures = new PictureModel;
        $Pictures = $Pictures->find($id);
        $this->assign('picture', $Pictures);
        return $this->fetch();
    }

    public function editPost()
    {
        $data      = $this->request->param();
        /*if(!empty($data['picture_src'])){
            $data['picture_src']  =  "https://".$_SERVER['SERVER_NAME'].$data['picture_src'];
        }*/
        //dump($data);die;
        $Pictures = new PictureModel();
        $Pictures->allowField(true)->isUpdate(true)->save($data);

        $this->success("保存成功！", url("Advert/index"));
    }
}