<?php /*a:1:{s:68:"D:\phpstudy_pro\WWW\gitShopTP\shopTP\app\admin\view\goods\index.html";i:1594889038;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商品列表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/static/admin/lib/layui-v2.5.4/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/public.css" media="all">
</head>
<body>
<div class="layuimini-container">
    <div class="layuimini-main">

        <fieldset class="layui-elem-field layuimini-search">
            <legend>搜索信息</legend>
            <div style="margin: 10px 10px 10px 10px">
                <form class="layui-form layui-form-pane" action="<?php echo url('index'); ?>" method="GET">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">商品名称</label>
                            <div class="layui-input-inline">
                                <input type="text" name="title" autocomplete="off" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-inline">
                            <label class="layui-form-label">发布时间</label>
                            <div class="layui-input-inline" style="width: 280px;">
                                <div class="layui-input-inline" style="width: 280px;">
                                    <input type="text" name="time" class="layui-input" id="test10"
                                           placeholder=" - ">
                                </div>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <button class="layui-btn" lay-submit="" lay-filter="data-search-btn">搜索</button>

                        </div>
                    </div>
                </form>
            </div>
        </fieldset>


        <div class="layuimini-main">
            <a href="<?php echo url('add'); ?>"><button type="button" class="layui-btn add">添 加</button></a>

            <div class="layui-form" style="margin-top: 20px;">
                <table class="layui-table">
                    <colgroup>
                        <col width="40">
                        <col width="60">
                        <col width="320">
                        <col width="130">
                        <col width="70">
                        <col width="200">
                        <col width="100">
                        <col width="85">
                    </colgroup>
                    <thead>
                    <tr>
                        <th style="text-align: center;">id</th>
                        <th style="text-align: center;">排序</th>
                        <th style="text-align: center;"> 商品名称</th>
                        <th class="text-center"style="text-align: center;">商品图片</th>
                        <th class="text-center"style="text-align: center;">库存</th>
                        <th class="text-center"style="text-align: center;">发布时间</th>
                        <th class="text-center"style="text-align: center;">状 态</th>
                        <th class="text-center"style="text-align: center;">是否推荐</th>
                        <th style="text-align: center;">操作管理</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!--一级类目循环-->
                    <?php if(is_array($goods['data']) || $goods['data'] instanceof \think\Collection || $goods['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $goods['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsdData): $mod = ($i % 2 );++$i;?>
                   
                    <tr>
                        <td style="text-align: center;"><?php echo htmlentities($goodsdData['id']); ?></td>
                        <td style="text-align: center;">
                            <div class="layui-input-inline layui-text-center">
                                <input type="text" value="<?php echo htmlentities($goodsdData['listorder']); ?>" data-id="<?php echo htmlentities($goodsdData['listorder']); ?>" class="changeSort layui-input">
                            </div>
                        </td>
                        <td style="text-align: center;"><?php echo htmlentities($goodsdData['title']); ?></td>
                        <td class="show-img" style="text-align: center;">
                            <img  src="<?php echo htmlentities($goodsdData['big_image']); ?>" data-src="<?php echo htmlentities($goodsdData['big_image']); ?>"  style="width: 24px;height: 24px;" />
                        </td>
                        <td style="text-align: center;"><?php echo htmlentities($goodsdData['stock']); ?></td>
                        <td style="text-align: center;"><?php echo htmlentities($goodsdData['create_time']); ?></td>
                        <td style="text-align: center;">
                            <input type="checkbox" checked name="status" lay-skin="switch"
                            lay-filter="switchStatus" lay-text="开启|关闭"></td>
                        <td data-id="<?php echo htmlentities($goodsdData['id']); ?>" style="text-align: center;">
                            <input type="checkbox" class="recommend" <?php if($goodsdData['is_index_recommend']): ?>checked <?php else: ?> <?php endif; ?> name="is_index_recommend" lay-skin="switch"
                                   lay-filter="isIndexRecommend"
                                   lay-text="是|否"></td>
                        <td style="text-align: center;">
                            <a class="layui-btn layui-btn-xs  edit" lay-event="edit">编辑</a>
                            <a class="layui-btn layui-btn-xs layui-btn-danger data-count-delete del-child" data-ptype="1"
                                    lay-event="delete" data-id="$id">删除
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    
                    </tbody>
                </table>
                <div id="test1"></div>
            </div>
        </div>
    </div>
</div>
<!-- <?php echo htmlentities($goods['total']); ?> -->
<script src="/static/admin/lib/jquery-3.4.1/jquery-3.4.1.min.js" charset="utf-8"></script>
<script src="/static/admin/lib/layui-v2.5.4/layui.js" charset="utf-8"></script>
<script>

    // 显示图片

    layui.use(['form', 'table', 'laydate','jquery','laypage'], function () {
        var $ = layui.jquery,
            form = layui.form,
            laypage = layui.laypage,
           laydate = layui.laydate;

        //日期时间范围 搜索
        laydate.render({
            elem: '#test10'
            , type: 'datetime'
            , range: true
        });

        $('.show-img').on('click',function(){
            var imgurl=$(this).find('img').attr('data-src');
            //页面层
            layer.open({
                type: 1,
                shade: 0.8,
                offset: 'auto',
                area: [500 + 'px',550+'px'],
                scrollbar: false,
                title:'图片预览',
                shadeClose: true, //开启遮罩关闭
                end: function (index, layero) {
                    return false;
                },
                content: `<div style="text-align:center"><img src="${imgurl}" /></div>`
            });
        });

        var laypage = layui.laypage;
        
        //执行一个laypage实例
        laypage.render({
            elem: 'test1' //注意，这里的 test1 是 ID，不用加 # 号
            ,count: <?php echo htmlentities($goods['total']); ?>,
            theme: '#FFB800',
            limit:<?php echo htmlentities($goods['per_page']); ?>,
            curr:<?php echo htmlentities($goods['current_page']); ?>,
            jump: function(obj,first){
                if(!first){
                    //跳转当前  指定的页码
                    location.href="?page="+obj.curr
                }
            }
        });
        //推荐
        form.on('switch(isIndexRecommend)', function (obj) {
            // console.log(obj.elem.checked, '改变状态')

            let id = obj.othis.parent().attr('data-id');
            let is_index_recommend = obj.elem.checked ? 1 : 0;
            $.ajax({
                url: '<?php echo url("Goods/recommend"); ?>?id=' + id + '&is_index_recommend=' + is_index_recommend,
                success: (res) => {
                    if(res.status==1){
                        console.log('更改成功');

                    }else{
                        console.log(id);
                        layer.msg('更改失败，查看是否含有大图');
                        window.location.reload();
                    }

                }
            });
            return false;
        });

    });
</script>
</body>
</html>
