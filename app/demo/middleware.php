<?php
// 全局中间件定义文件
//中间件 作用于请求中，在浏览器发送请求，响应之前执行的程序文件
return [
    // 全局请求缓存
    // \think\middleware\CheckRequestCache::class,
    // 多语言加载
    // \think\middleware\LoadLangPack::class,
    // Session初始化
    // \think\middleware\SessionInit::class
    app\demo\middleware\Check::class
];
