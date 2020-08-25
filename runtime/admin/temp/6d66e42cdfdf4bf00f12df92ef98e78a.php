<?php /*a:1:{s:71:"D:\phpstudy_pro\WWW\gitShopTP\shopTP\app\admin\view\category\index.html";i:1594348258;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/static/admin/lib/layui-v2.5.4/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/public.css" media="all">
    <style>
        .inoutCls {
            height: 22px;
            line-height: 22px;
            padding: 0 5px;
            font-size: 12px;
            background-color: #1E9FFF;
            max-width: 80px;
            border: none;
            color: #fff;
            margin-left: 10px;
            display: inline-block;
            white-space: nowrap;
            text-align: center;
            border-radius: 2px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="layuimini-container">
        <div class="layuimini-main">
            <button type="button" class="layui-btn add">添 加</button>
            <a href="<?php echo url('index'); ?>" ><button type="button" class="layui-btn">顶级栏目</button></a>
            
            <div class="layui-form" style="margin-top: 20px;">
                <table class="layui-table">
                    <colgroup>
                        <col width="40">
                        <col width="60">
                        <col width="100">
                        <col width="130">
                        <col width="130">
                        <col width="70">
                        <col width="70">
                        <col width="185">
                    </colgroup>
                    <thead>
                        <tr>
                            <th style="text-align: center;">id</th>
                            <th style="text-align: center;">标题</th>
                            <th style="text-align: center;">排序</th>
                            <th style="text-align: center;">创建时间</th>
                            <th style="text-align: center;">更新时间</th>
                            <th style="text-align: center;">操作人</th>
                            <th style="text-align: center;">状 态</th>
                            <th style="text-align: center;">操作管理</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--一级类目循环-->

                        <?php if(is_array($getCategoryList['data']) || $getCategoryList['data'] instanceof \think\Collection || $getCategoryList['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $getCategoryList['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$categoryList): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td style="text-align: center;">
                                <?php echo htmlentities($categoryList['id']); ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo htmlentities($categoryList['name']); ?>
                            </td>
                            <td style="text-align: center;">
                                <div class="layui-input-inline">
                                    <input type="text" style="text-align: center;" value="<?php echo htmlentities($categoryList['listorder']); ?>"
                                        data-id="<?php echo htmlentities($categoryList['id']); ?>"  class="changeSort layui-input">
                                </div>

                            </td>
                            <td style="text-align: center;">
                                <?php echo htmlentities($categoryList['create_time']); ?>
                            </td>
                            <td style="text-align: center;"><?php echo htmlentities($categoryList['update_time']); ?></td>
                            <td style="text-align: center;"><?php echo htmlentities($categoryList['operation_user']); ?></td>

                            <td style="text-align: center;" data-id="<?php echo htmlentities($categoryList['id']); ?>">
                                                        <!-- thinktemplate模板 语法  if语句  结束符号{/if}中间不能够有空格 -->
                                <input type="checkbox" <?php if($categoryList['status']==1): ?> checked <?php endif; ?> name="status"
                                    lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF">
                            </td>
                            <td style="text-align: center;">
                                <a class="layui-btn layui-btn-xs layui-btn-danger data-count-delete del-child"
                                    data-ptype="1" lay-event="delete" data-id="<?php echo htmlentities($categoryList['id']); ?>">删除</a>
                                    <!-- 获取子分类的地址错误   <?php echo url(''); ?>   传递参数的方法如下  牢记   -->
                                <a href="<?php echo url('index'); ?>?pid=<?php echo htmlentities($categoryList['id']); ?>"  style="background-color: #1E9FFF;"
                                    class="layui-btn layui-btn-xs layui-btn-danger  ">获取子栏目(<?php echo htmlentities($categoryList['childCount']); ?>)</a>
                                
                                <input type="button"  style="background-color: green;"  class="layui-btn layui-btn-xs layui-btn-danger edit " data-id="<?php echo htmlentities($categoryList['id']); ?>"  value="编辑">
                                <span class="layui-btn layui-btn-xs layui-btn-danger return" title="返回上一级" ><i class="layui-icon layui-icon-left"></i> </span>
                                <!-- <input type="hidden" value="<?php echo htmlentities($categoryList['id']); ?>" class="editVal" > -->
                                <!-- <a href="<?php echo url('categoryEdit'); ?>?id=<?php echo htmlentities($categoryList['id']); ?>" style="background-color:green;"
                                    class="layui-btn layui-btn-xs layui-btn-danger edit ">编辑</a> -->
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        
                        <!--一级类目循环 end-->
                    </tbody>
                </table>
            </div>
            <div id="pages"></div>
        </div>

    </div>
    <!-- <style>
        ul li {
            float: left;
        }
    </style> -->
    <script src="/static/admin/lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="/static/admin/lib/layui-v2.5.4/layui.js" charset="utf-8"></script>
    <script src="/static/admin/js/common.js?v5" charset="utf-8"></script>
    <!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
    <script>
       
        //   使用 layui  模板的分页方法   牢记  牢记  牢记
        layui.use(['form', 'laypage'], function () {
            var form = layui.form
                , laypage = layui.laypage;

            laypage.render({ //分页
                elem: 'pages',
                count: <?php echo htmlentities($getCategoryList['total']); ?>,
                theme: '#FFB800',
                limit:<?php echo htmlentities($getCategoryList['per_page']); ?>,
                curr:<?php echo htmlentities($getCategoryList['current_page']); ?>,
                jump:function(obj,first) {
                    if(!first){
                        //跳转当前  指定的页码
                        location.href="?page="+obj.curr+"&pid=<?php echo htmlentities($pid); ?>"
                    }
                }
            });


            // 添加 分类
            $('.add').on('click', function () {
                layObj.dialog("<?php echo url('category/add'); ?>");
            });
            //分类  编辑
            $('.edit').on('click', function () {
                let id = $(this).attr('data-id');
                let val = $(this).val();
                // console.log(v);
                layObj.dialog("<?php echo url('categoryEdit'); ?>?id="+id);
            });
            //分类列表获取子分类后，返回上一层
            $('.return').on('click', function () {
                window.history.back(-1);
            });

            //监听状态 更改
            form.on('switch(switchTest)', function (obj) {
                // console.log(obj.elem.checked, '改变状态')

                let id = obj.othis.parent().attr('data-id');
                let status = obj.elem.checked ? 1 : 0;
                $.ajax({
                    url: '<?php echo url("Category/changeStatus"); ?>?id=' + id + '&status=' + status,
                    success: (res) => {
                        if(res.status==1){
                            console.log(res.message);
                            
                        }else{
                            console.log(res.message);
                            window.location.reload();
                        }
                       
                    }
                });
                return false;
            });


            function editCls(that, id, type) { // 分类修改  type 是 1 顶级  2级  3级
                let name = $(that).val();
                if (!name && (type == 1 || type == 2)) {
                    return layObj.msg('分类名称不能为空')
                }
                if (!name && type == 3) { // 演示 应该放到修改回调中  进行处理
                    return $(that).parent().remove()
                }
                let url = '<?php echo url("admin/edit"); ?>?id=' + id + '&name=' + name
                layObj.get(url, (res) => {
                    if (name && res) {
                        $(that).val(name)
                    }
                })
                $.ajax({
                    url: '<?php echo url("admin/edit"); ?>?id=' + id + '&name=' + name,
                    success(res) {
                        if (name && res) {
                            $(that).val(name)
                        }
                    }
                })
            }

            // 删除二级分类
            $('.del-child').on('click', function () {
                let ptype = $(this).attr('data-ptype'); // fu
                let id = $(this).attr('data-id'); // fu
                layObj.box(`是否删除此分类`, () => {
                    let url = '<?php echo url("Category/delCategory"); ?>?id=' + id + "&status=99" ;
                    layObj.get(url, (res) => {
                        layer.closeAll();
                        window.location.reload();
                    })

                })
            })


            $('.changeSort').on('change', function () {
                let id = $(this).attr('data-id');
                let val = $(this).val();

                if (!val) {
                    return;
                }
                let url = '<?php echo url("Category/listOrder"); ?>?id=' + id + '&listorder=' + val;
                // let url = 'http:www.baidu.com';
                layObj.get(url, function (res) {
                    layer.msg(res.message);
                    window.location.reload();
                })

            })

        })
    </script>
</body>

</html>