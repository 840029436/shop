<?php


namespace app\api\controller\mall;

use app\api\controller\ApiBase;

class Lists extends ApiBase
{
    public function category()
    {
        $pageSize=$this->request->param('page.size',0,"install");
        $categoryId=$this->request->param('category_id',0,"install");
        return show(0,'ok');
    }

}