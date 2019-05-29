<?php /*a:2:{s:83:"D:\wampserver\www\thinkcmf\public/themes/admin_simpleboot3/admin\teacher\index.html";i:1559063991;s:77:"D:\wampserver\www\thinkcmf\public/themes/admin_simpleboot3/public\header.html";i:1557818809;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->


    <link href="/themes/admin_simpleboot3/public/assets/themes/<?php echo cmf_get_admin_style(); ?>/bootstrap.min.css" rel="stylesheet">
    <link href="/themes/admin_simpleboot3/public/assets/simpleboot3/css/simplebootadmin.css" rel="stylesheet">
    <link href="/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        form .input-order {
            margin-bottom: 0px;
            padding: 0 2px;
            width: 42px;
            font-size: 12px;
        }

        form .input-order:focus {
            outline: none;
        }

        .table-actions {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 0px;
        }

        .table-list {
            margin-bottom: 0px;
        }

        .form-required {
            color: red;
        }
    </style>
    <script type="text/javascript">
        //全局变量
        var GV = {
            ROOT: "/",
            WEB_ROOT: "/",
            JS_ROOT: "static/js/",
            APP: '<?php echo app('request')->module(); ?>'/*当前应用名*/
        };
    </script>
    <script src="/themes/admin_simpleboot3/public/assets/js/jquery-1.10.2.min.js"></script>
    <script src="/static/js/wind.js"></script>
    <script src="/themes/admin_simpleboot3/public/assets/js/bootstrap.min.js"></script>
    <script>
        Wind.css('artDialog');
        Wind.css('layer');
        $(function () {
            $("[data-toggle='tooltip']").tooltip({
                container:'body',
                html:true,
            });
            $("li.dropdown").hover(function () {
                $(this).addClass("open");
            }, function () {
                $(this).removeClass("open");
            });
        });
    </script>
    <?php if(APP_DEBUG): ?>
        <style>
            #think_page_trace_open {
                z-index: 9999;
            }
        </style>
    <?php endif; ?>
</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo url('teacher/index'); ?>">所有教师信息</a></li>
        <li><a href="<?php echo url('teacher/add'); ?>">添加教师信息</a></li>
    </ul>
    <form method="post" class="js-ajax-form margin-top-20" action="<?php echo url('teacher/listOrder'); ?>">
        <div class="table-actions">
            <button class="btn btn-sm btn-primary js-ajax-submit" type="submit"><?php echo lang('SORT'); ?></button>
            <button class="btn btn-sm btn-success js-ajax-submit" type="submit" data-action="<?php echo url('teacher/toggle',array('display'=>1,'type'=>'sex')); ?>" data-subcheck="true">男
            </button>
            <button class="btn btn-sm btn-danger js-ajax-submit" type="submit"
                    data-action="<?php echo url('teacher/toggle',array('hide'=>1,'type'=>'sex')); ?>" data-subcheck="true">女
            </button>
        </div>
        <?php $sex=array("1"=>"男","0"=>"女"); $status=array("1"=>"毕业","0"=>"未毕业"); ?>
        <table class="table table-hover table-bordered table-list">
            <thead>
            <tr>
                <th width="16">
                    <label>
                        <input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x">
                    </label>
                </th>
                <th width="50"><?php echo lang('SORT'); ?></th>
                <th width="50">ID</th>
                <th>教师姓名</th>
                <th>年龄</th>
                <th>手机号码</th>
                <th>照片</th>
                <th>职位</th>
                <th width="50">性别</th>
                <th width="120"><?php echo lang('ACTIONS'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($teachers) || $teachers instanceof \think\Collection || $teachers instanceof \think\Paginator): if( count($teachers)==0 ) : echo "" ;else: foreach($teachers as $key=>$vo): ?>
                <tr>
                    <td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]"
                               value="<?php echo $vo['teacher_id']; ?>"></td>
                    <td><input name='list_orders[<?php echo $vo['teacher_id']; ?>]' class="input input-order mr5" type='text' size='3'
                               value='<?php echo $vo['list_order']; ?>'></td>
                    <td><?php echo $vo['teacher_id']; ?></td>
                    <td><?php echo $vo['name']; ?></td>
                    <td><?php echo $vo['age']; ?></td>
                    <td><?php echo $vo['teacher_tel']; ?></td>
                    <td><?php echo $vo['teacher_portrait_src']; ?></td>
                    <td><?php echo $vo['position_id']; ?></td>
                    <td>
                        <?php if(empty($vo['sex']) || (($vo['sex'] instanceof \think\Collection || $vo['sex'] instanceof \think\Paginator ) && $vo['sex']->isEmpty())): ?>
                            <span class="label label-default">
                                <?php echo $sex[$vo['sex']]; ?>
                            </span>
                            <?php else: ?>
                            <span class="label label-success">
                                <?php echo $sex[$vo['sex']]; ?>
                            </span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="<?php echo url('teacher/edit',array('id'=>$vo['teacher_id'])); ?>"><?php echo lang('EDIT'); ?></a>
                        <a class="btn btn-xs btn-danger" href="<?php echo url('teacher/delete',array('id'=>$vo['teacher_id'])); ?>" class="js-ajax-delete">
                            <?php echo lang('DELETE'); ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
                <td colspan="14"><div class="pagination"><?php echo $page; ?></div></td>
            </tr>
        </table>
    </form>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>