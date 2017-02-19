<?php
    include_once('config/config.php'); //加载配置文件
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>WIKI<?php echo ' | '.PRODUCT_NAME;?></title>
    <link rel="stylesheet" href="assets/css/semantic.min.css">
</head>
<body>
<div class="ui large top fixed menu transition visible" style="display: flex !important;">
    <div class="ui container">
        <div class="header item">API_DOC<code>(1.0)</code></div>
        <a class="item" href="list_class.php">文件列表</a>
        <a class="item">接口列表</a>
        <a class="item">文档详情</a>
        <a class="item">使用说明</a>
        <a class="item active" href="status.php">状态码</a>
    </div>
</div>
<div class="ui text container" style="max-width: none !important;margin-top: 50px;">
    <div class="ui floating message">
        <h1 class="ui header">状态码说明</h1>
        <table class="ui black celled striped table">
            <thead>
            <tr>
                <th>状态码</th>
                <th>说明</th>
                <th>备注</th>
                <iframe id="tmp_downloadhelper_iframe" style="display: none;"></iframe></tr>
            </thead>
            <tbody>
            <tr>
                <td>20000</td>
                <td>服务器已成功处理了请求。</td>
                <td>服务器成功返回内容</td>
            </tr>
            <tr>
                <td>20001</td>
                <td>请求成功并且服务器创建了新的资源</td>
                <td>新增内容成功</td>
            </tr> <tr>
                <td>20002</td>
                <td>服务器已接受请求，但尚未处理</td>
                <td>待审核/待处理</td>
            </tr><tr>
                <td>20003</td>
                <td>服务器已成功处理了请求，但返回的信息可能来自另一来源。</td>
                <td>非授权信息</td>
            </tr><tr>
                <td>20004</td>
                <td>服务器成功处理了请求，但没有返回任何内容。</td>
                <td>无内容返回（404）</td>
            </tr><tr>
                <td>20005</td>
                <td>服务器成功处理了请求，但没有返回任何内容。与 20004 响应不同，此响应要求请求者重置文档视图（例如，清除表单内容以输入新内容）</td>
                <td>无内容返回</td>
            </tr><tr>
                <td>20006</td>
                <td>服务器成功处理了部分 GET 请求。</td>
                <td>部分内容（如分页）</td>
            </tr><tr>
                <td>20007</td>
                <td>服务器成功处理了请求，但请求的用户（账号）被禁用</td>
                <td>用户被禁用</td>
            </tr><tr>
                <td>20008</td>
                <td>服务器成功处理了请求，但请求的用户（账号）还未通过审核</td>
                <td>账号待审核</td>
            </tr><tr>
                <td>20009</td>
                <td>服务器成功处理了请求，但用户名或密码不正确。</td>
                <td>用户名或密码不对</td>
            </tr><tr>
                <td>20010</td>
                <td>服务器成功处理了请求，但用户名已经存在。</td>
                <td>用户名或昵称重复</td>
            </tr><tr>
                <td>20011</td>
                <td>服务成功处理了请求，但创建内容出错。</td>
                <td>添加内容失败</td>
            </tr><tr>
                <td>20012</td>
                <td>服务器收到了请求，但Token验证失败</td>
                <td>Token验证失败</td>
            </tr><tr>
                <td>20013</td>
                <td>服务成功处理了请求，但删除内容出错。</td>
                <td>删除内容失败</td>
            </tr><tr>
                <td>20014</td>
                <td>不支持该请求方式</td>
                <td>请求方式出错</td>
            </tr><tr>
                <td>20015</td>
                <td>支付成功</td>
                <td>支付成功</td>
            </tr><tr>
                <td>20016</td>
                <td>服务器收到了请求，但修改内容失败</td>
                <td>修改失败</td>
            </tr>
        </table>
    </div>
    <p><?php echo COPYRIGHT;?></p>
</div>


</body>
</html>