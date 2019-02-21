<?php
/**
 * Created by PhpStorm.
 * User: tedu
 * Date: 2018/11/29
 * Time: 16:32
 */
namespace app\admin\controller;

use app\admin\model\BlogModel;
use libs\BaseController;
use libs\Page;

class BlogController extends BaseController
{
    public function bloglist()
    {
        $model=new BlogModel();

        $p=$_GET['p']??1;
        $num=3;
        $total=$model->getTotal();
        $start=($p-1)*$num;
        $arr=$model->getBlogsLimit($start, $num);
        $page = new Page($total, $num, 'c=blog&a=bloglist&m=admin');

        $args=[
            'page'=>$page,
            'arr'=>$arr
        ];
        $this->display($args);
    }
}